@include('header') 

<div class="container my-5">
    
    <div class="card shadow-sm">
        <div class="card-body">
            
            <h3 class="card-title text-center mb-4">Order Finished</h3>

            
            <p class="h5"><strong>Order Reference Number:</strong> #{{ $order->reference_number }}</p>

            
            <p class="h5"><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>

            
            <p class="h6"><strong>Order Date:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y') }}</p>

            
            <div class="text-center mt-4">
                <button class="btn btn-primary" onclick="window.location.href='{{ route('products.index') }}'">Continue Shopping</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
