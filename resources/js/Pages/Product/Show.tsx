import {Product, VariationTypeOption} from "@/types";
import {useForm, usePage} from "@inertiajs/react";
import {useMemo, useState} from "react";

function Show({product, variationOptions}: {
    product: Product, variationOptions: number[]
}) {
  const form= useForm<{
    option_ids: Record<string, number>;
    quantity: number;
    price: number | null;

  }>({
    option_ids: {},
    quantity:1,
    price: null


  });
  const { url } = usePage();

  const [selectedOptions, setSelectedOptions] = useState<
    Record<number, VariationTypeOption>
  >([]);

  const images = useMemo(() => {
    for (let typeId in selectedOptions) {
      const option = selectedOptions[typeId];
      if (option.images.length > 0) return option.images;
    }
    return product.images;
  }, [product, selectedOptions]);

}

// // function Show({product}: {product: Product}) {
// //   return (
// //     <div>Test: product description</div>
// //   );
// }

export default Show;
