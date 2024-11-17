@extends(backpack_view('blank'))
@section('content')
    <center>
        <h3>Thêm sản phẩm cho event</h3>
    </center>
    <form method="POST">
				@csrf
        <div data-product="{{ json_encode($products) }}" id='products'></div>
        <div class="card no-padding no-border mb-0 mt-5">
            <table class="table table-striped m-0 p-0 " id="product-table">
                <thead>
                    <tr>
                        <th scope="col"><strong>Sản phẩm</strong></th>
                        <th scope="col"><strong>Phần trăm giảm giá</strong></th>
                        <th scope="col"><strong>Thao tác</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <section>
                                <select name="product_id[]">
                                    <option value="0">Chọn sản phẩm</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                                    @endforeach
                                </select>
                            </section>
                        </th>
                        <td><input type="text" name="per[]" /></td>
                        <td><button type="button" class="add-row btn btn-primary">+</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="mt-3 p-2 btn btn-primary">Thêm</button>
    </form>
@endsection

@section('after_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('product-table');
            const products = JSON.parse(document.getElementById('products').dataset.product);

            table.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('add-row')) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <th scope="row">
                            <section>
                                <select name="product_id[]">
                                    <option value="0">Chọn sản phẩm</option>
                                    ${products.map(product => `<option value="${product.id}">${product.name}</option>`).join('')}
                                </select>
                            </section>
                        </th>
                        <td><input type="text" name="per[]" /></td>
                        <td><button type="button" class="remove-row btn btn-primary">-</button></td>
                    `;

                    table.querySelector('tbody').appendChild(newRow);
                }

                if (e.target && e.target.classList.contains('remove-row')) {
                    e.target.closest('tr').remove();
                }
            });
        });
    </script>
@endsection
