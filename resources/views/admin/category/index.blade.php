@extends('admin.layout.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Service</h4>
                        </div>
                        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Service Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                    @error('name')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile"
                                        accept="image/*" name="image">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    @error('image')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomIcon"
                                        accept="image/*" name="icon">
                                    <label class="custom-file-label" for="validatedCustomIcon">Choose Icon...</label>
                                    @error('icon')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Add Service</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Services</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Service</th>
                                            <th>Image</th>
                                            <th>Icon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablecontents">
                                        @forelse($categories as $category)
                                        <tr class="row1" data-id="{{ $category->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucwords($category->name) }}</td>
                                            <td>
                                                @if(isset($category->image))
                                                <img src="{{ asset($category->image) }}" alt="" width="100px"
                                                    height="50px">
                                                @else
                                                Null
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($category->icon))
                                                <img src="{{ asset($category->icon) }}" alt="" width="36px"
                                                    height="36px" style="background-color: var(--orange);">
                                                @else
                                                Null
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                                    class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-edit">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                        </path>
                                                        <path
                                                            d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                        </path>
                                                    </svg></a>
                                                <form action="{{ route('admin.category.destroy', $category->id) }}"
                                                    method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-primary" type="submit"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4">Data Not Found!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script type="text/javascript">
$(function() {
    // $("#table-1").DataTable();

    $("#tablecontents").sortable({
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        update: function() {
            sendOrderToServer();
        }
    });

    function sendOrderToServer() {
          var order = [];
          $('tr.row1').each(function(index,element) {
            order.push({
              id: $(this).attr('data-id'),
              position: index+1
            });
          });
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('admin.cat_order.update') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                order: order,
            },
            success: function(response) {
                if (response.status == "success") {
                    console.log(response);
                } else {
                    window.location.reload();
                    // console.log(response);
                }
            }
        });
    }
});
</script>

@endsection