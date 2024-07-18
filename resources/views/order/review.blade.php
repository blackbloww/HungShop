@include('layout.user')

<style>
    .star-rating {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .star-rating input {
        display: none;
    }
    .star-rating label {
        cursor: pointer;
        font-size: 2rem;
        color: #ccc;
        transition: color 0.3s;
    }
    .star-rating input:checked ~ label {
        color: #f7d531;
    }
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f7d531;
    }
</style>

<div class="container mx-auto bg-white max-w-md shadow-md rounded-lg overflow-hidden">
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-4">Đánh giá sản phẩm: {{ $product->name }}</h2>
        <form action="{{ route('orders.submitReview', ['order_id' => $order->id, 'product_id' => $product->product_id]) }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex items-center space-x-2">
                <label for="rating" class="text-gray-600">Đánh giá:</label>
                <div class="star-rating">
                    <input type="radio" id="rating1" name="rating" value="1" /><label for="rating1">&#9733;</label>
                    <input type="radio" id="rating2" name="rating" value="2" /><label for="rating2">&#9733;</label>
                    <input type="radio" id="rating3" name="rating" value="3" /><label for="rating3">&#9733;</label>
                    <input type="radio" id="rating4" name="rating" value="4" /><label for="rating4">&#9733;</label>
                    <input type="radio" id="rating5" name="rating" value="5" /><label for="rating5">&#9733;</label>
                </div>
            </div>
            <div>
                <label for="review" class="block text-gray-600">Nhận xét:</label>
                <textarea id="review" name="review" class="form-textarea w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" rows="4"></textarea>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Gửi đánh giá</button>
            </div>
        </form>
    </div>
</div>

<script>
    const stars = document.querySelectorAll('.star-rating input');

    stars.forEach((star, index) => {
        star.addEventListener('click', function() {
            resetStarColors();
            for (let i = index; i >= 0; i--) {
                stars[i].nextElementSibling.style.color = '#f7d531';
            }
        });
    });

    function resetStarColors() {
        stars.forEach(star => {
            star.nextElementSibling.style.color = '#ccc';
        });
    }
</script>

@include('layout.footer')