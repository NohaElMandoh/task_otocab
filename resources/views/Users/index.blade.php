   @extends('layouts.app')

   @section('content')
   <!-- /.box-header -->
   <div class="box-body">
     <div class="table-responsive">
       <table class="table no-margin">
         <thead>
           <tr>
             <th>#</th>
             <th>User Name</th>
             <th>Status</th>
             <th>Activity</th>

           </tr>
         </thead>
         <tbody>
           @foreach($users as $key=>$user)

           <tr>
             <td><a href="#">{{$key+1}}</a></td>
             <td>{!!$user->name!!}</td>
             <td>
               <form method="" action="">


                 @csrf
                 <input type="checkbox" id="updateStatus" @if($user->status==1) checked @endif class="form-check-input" data-id="{{$user->id}}" > &nbsp; &nbsp; &nbsp; &nbsp;approve

               </form>
             </td>

             <td>
               <form method="" action="">


                 @csrf

                 <input type="checkbox" id="updateActivity" @if($user->activity==1) checked @endif class="form-check-input" data-id="{{$user->id}}" > &nbsp; &nbsp; &nbsp; &nbsp;Activate

               </form>
             </td>

           </tr>
           @endforeach


         </tbody>
       </table>
     </div>
     <!-- /.table-responsive -->
   </div>
   <!-- /.box-body -->
   @endsection

   @section('scripts')
   <script>
     $(document).on('click', '#updateStatus', function(e) {
       e.preventDefault();
       user_id = $(this).data('id');

       var form = new FormData();

       form.append('user_id', user_id);

       base_url = '{{url("/")}}';

       var url = base_url + '/admin/updateUserStatus/' + user_id,
         method = 'POST',
         modal = '#taskStatusModal';
       editForm(e, url, method, form, modal);
     });

     $(document).on('click', '#updateActivity', function(e) {
       e.preventDefault();
       user_id = $(this).data('id');

       var form = new FormData();

       form.append('user_id', user_id);

       base_url = '{{url("/")}}';

       var url = base_url + '/admin/updateActivity/' + user_id,
         method = 'POST',
         modal = '#taskStatusModal';
       editForm(e, url, method, form, modal);
     });

     function editForm(e, url, method, data, modal) {
       $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },

       });
       $.ajax({
         url: url,
         type: method,
         data: data,
         cache: false,
         contentType: false,
         processData: false,
         success: function(data) {
           if (data.success == true) {
             showSwal('success', data.message, '#reModal');
             // page=data.page;

             setTimeout("location.reload(true);", 1500);
             // callback(data.page);
           } else {
             printErrors(data.errors);
           }
         }
       });
     }
   </script>
   @endsection