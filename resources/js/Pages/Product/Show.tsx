import {Product} from "@/types";

function Show({product, variationOptions}: {
    product: Product, variationOptions: number[]
}) {

    console.log(product, variationOptions)
    return (
        <div>Test</div>
    );
}

export default Show;
