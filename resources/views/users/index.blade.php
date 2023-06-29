@extends('layouts.app')

@section('content')
<head>
    {{-- <meta name="csrf-token" content="{{csrf_token()}}"> --}}
</head>
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Users') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">

                <div class="table-wrapper table-responsive">
                    <table class="table striped-table">
                        <thead>
                        <tr>
                            <th><h6>Name</h6></th>
                            <th><h6>Email</h6></th>
                            <th><h6>Admin</h6></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <p>{{ $user->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $user->email }}</p>
                                </td>
                                <td>
                                    @csrf
                                    <input type="checkbox" id="id" value="{{$user->id}}" onchange="myCheckbox()" name="myCheckbox">
                                </td>
                                
                            </tr>
                        @endforeach
                        <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    
    function myCheckbox(){
        var id = document.getElementById('id').value;
        console.log(id);
        
        $.ajax({
            type: 'POST',
            url: '/update_role/'+id,
            
        
            success: function(response) {
                alert(response);
                console.log(response);
            },
    })
    }

</script>  

