<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All-student</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>All Student</h2><button class="btn btn-primary" data-toggle="modal" data-target="#studentModal">Add New Student</button>
            <a href="#" class="btn btn-danger" id="deleteAllSelectedRecord">Delete All Selected</a>
        </div>
        <div class="card-body">
            @if(Session::has('data_deleted'))
                <div class="alert alert-success" role="alert">
                {{Session::get('data_deleted')}}
                </div>
                @endif
           <table id="students" class="table table-striped">
                <thead>
                    <tr>
                        <th width="5%"><input type="checkbox" id="checkAllbox" /></th>
                        <th width="20%">First Name</th>
                        <th width="20%">Last Name</th>
                        <th width="20%">Email</th>
                        <th width="20%">Phone</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr id="sid{{$student->id}}">
                        <td width="5%"><input type="checkbox" name="ids" class="chechBoxClass" value="{{$student->id}}"/></td>
                        <td width="20%">{{$student->firstname}}</td>
                        <td width="20%">{{$student->lastname}}</td>
                        <td width="20%">{{$student->email}}</td>
                        <td width="20%">{{$student->phone}}</td>
                        <td width="15%">
                            <a href="javascript:void(0)" onclick="editStudent({{$student->id}})" class="btn btn-info">Edit</a>
                            <a href="javascript:void(0)"  onclick="deleteStudent({{$student->id}})" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
           </table>
        </div>
    </div>


<!-- Add Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <form method="POST" action="{{route('student.add')}}"> -->
        <form id="studentform">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlFile1">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Email</label>
                    <input type="email" class="form-control" name="email" id="email"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone"/>
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="studenteditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <form method="POST" action="{{route('student.add')}}"> -->
        <form id="studenteditform">
                @csrf
                <input type="hidden" id="id" name="id" />
                <div class="form-group">
                    <label for="exampleFormControlFile1">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname2"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname2"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Email</label>
                    <input type="email" class="form-control" name="email" id="email2"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone2"/>
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

</div>  
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $("#studentform").submit(function(e){
        e.preventDefault();
        let firstname = $("#firstname").val();
        let lastname = $("#lastname").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{route('student.add')}}",
            type: "POST",
            data:{
                firstname:firstname,
                lastname:lastname,
                email:email,
                phone:phone,
                _token:_token
            },
            success:function(response){
                if(response){
                   $("#students tbody").prepend('<tr><td><input type="checkbox" name="ids" class="chechBoxClass" value="'+response.id+'"/></td><td>'+response.firstname+'</td><td>'+response.lastname+'</td><td>'+response.email+'</td><td>'+response.phone+'</td><td><a href="javascript:void(0)" onclick="editStudent({{"'+response.id+'"}})" class="btn btn-info">Edit</a><a href="javascript:void(0)"  onclick="deleteStudent({{"'+response.id+'"}})" class="btn btn-danger">Delete</a></td></tr>');                            
                    $("#studentform")[0].reset();
                    $("#studentModal").modal('hide');
                }
            }
        });
    });
</script>

<script>
    function editStudent(id){
        $.get('/students/'+id, function(student){
            $("#id").val(student.id);
            $("#firstname2").val(student.firstname);
            $("#lastname2").val(student.lastname);
            $("#email2").val(student.email);
            $("#phone2").val(student.phone);
            $("#studenteditModal").modal('toggle');
        });
    }

    $("#studenteditform").submit(function(e){
        e.preventDefault();
        let id = $("#id").val();
        let firstname = $("#firstname2").val();
        let lastname = $("#lastname2").val();
        let email = $("#email2").val();
        let phone = $("#phone2").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{route('student.update')}}",
            type: "PUT",
            data:{
                id:id,
                firstname:firstname,
                lastname:lastname,
                email:email,
                phone:phone,
                _token:_token
            },
            success:function(response){
                $('#sid' + response.id +' td:nth-child(2)' ).text(response.firstname);
                $('#sid' + response.id +' td:nth-child(3)' ).text(response.lastname);
                $('#sid' + response.id +' td:nth-child(4)' ).text(response.email);
                $('#sid' + response.id +' td:nth-child(5)' ).text(response.phone);
                $("#studenteditModal").modal('toggle');
                $("#studenteditform")[0].reset();
            }
        });
    });

    function deleteStudent(id){
        if(confirm('Do you want to delete?')){
            let _token = $("input[name=_token]").val();
            $.ajax({
            url: '/students/'+id,
            type: "DELETE",
            data:{
                _token:_token
            },
            success:function(response){
                $("#sid"+id).remove();
            }
        });
        }
    }

    $(function(e){
        $("#checkAllbox").click(function(e){
            $(".chechBoxClass").prop('checked', $(this).prop('checked'));
        });
        
        $("#deleteAllSelectedRecord").click(function(e){
            e.preventDefault();
            var allIds = [];

            $("input:checkbox[name=ids]:checked").each(function(){
                allIds.push($(this).val());
            });

            let _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{route('student.deleteSelected')}}",
                type: "DELETE",
                data: {
                    _token:_token,
                    ids: allIds
                },
                success:function(response){
                    $.each(allIds,function(key,val){
                        $("#sid"+val).remove();
                    })
                }
            });
        });

    });
</script>
</body>
