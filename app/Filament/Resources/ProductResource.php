<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Filament\Resources;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\Pages\EditProduct;
use App\Filament\Resources\ProductResource\Pages\ProductVariationTypes;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\Filament\Resources\ProductResource\Pages\ProductVariations;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-s-queue-list';


    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->forVendor();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema(components: [
                        Forms\Components\TextInput::make('title')
                            ->live(onBlur: true)
                            ->required()
                            ->afterStateUpdated(
                                function (string $operation, $state, callable $set){
                                    $set("slug", Str::slug($state));
                                }
                            ),
                        Forms\Components\TextInput::make('slug')
                        ->required(),
                        Forms\Components\Select::make('department_id')
                        ->relationship('department', 'name')
                        ->label(__('Department'))
                        ->preload()
                        ->searchable()
                        ->required()
                        ->reactive() //field is reactive to changes
                        ->afterStateUpdated(function (callable $set){
                            $set('category_id', null); //reset category when department changes
                        }),
                    Forms\Components\Select::make('category_id')
                        ->relationship(
                            name: 'category',
                            titleAttribute: 'name',
                            modifyQueryUsing: function (Builder $query, callable $get){
                                //Modify the category query based on the selected department
                                $departmentId = $get('department_id'); // Get selected department
                                if ($departmentId) {
                                    $query->where('department_id', $departmentId);
                                }
                                return $query;
                            }

                        )
                        ->label(__('Category'))
                        ->preload()
                        ->searchable()
                        ->required()


                    ]),
                Forms\Components\RichEditor::make('description')

                    ->required()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                        'table'
                    ])
                    ->columnSpan(2),
                Forms\Components\TextInput::make('price')
                ->required()
                ->numeric(),
                Forms\Components\TextInput::make('quantity')
                ->integer(),
                Forms\Components\Select::make('status')
                ->options(ProductStatusEnum::labels())
                ->default(ProductStatusEnum::Draft->value)
                ->required()







            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('images')
                    ->collection('images')
                    ->limit(1)
                    ->conversion('thumb')
            ->label('Image'),
                Tables\Columns\TextColumn::make('title')
                ->sortable()
                ->words(10)
                ->searchable(),
                Tables\Columns\TextColumn::make('status')
                ->badge()
                ->colors(ProductStatusEnum::colors()),
                Tables\Columns\TextColumn::make('department.name'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                ->options(ProductStatusEnum::labels()),
                Tables\Filters\SelectFilter::make('department_id')
                ->relationship('department', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
            'images' => Pages\ProductImages::route('/{record}/images'),
            'variation-types' => Pages\ProductVariationTypes::route('/{record}/variation-types'),
            'variations' => Pages\ProductVariations::route('/{record}/variations'),
        ];
    }
    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            EditProduct::class,
            Pages\ProductImages::class,
            ProductVariationTypes::class,
            ProductVariations::class,

            ]);

    }

}
