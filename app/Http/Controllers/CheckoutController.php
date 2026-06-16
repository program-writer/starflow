<?php

namespace App\Http\Controllers;

use App\Actions\Checkout\CheckoutAction;
use App\DTO\CheckoutDto;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function __invoke(CheckoutRequest $request, CheckoutAction $action)
    {
        $dto = new CheckoutDto(
            customerEmail: $request->string(
                'customer_email'
            )->toString(),
            productId: $request->integer(
                'product_id'
            ),
            quantity: $request->integer(
                'quantity'
            ),
            idempotencyKey: (string) Str::uuid(),
        );
        $order = $action->handle($dto);

        return response()->json([
            'order_id' => $order->id,
        ], 201);
    }
}
