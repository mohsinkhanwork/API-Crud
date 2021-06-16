<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>create-form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>

                @endif
                <div class="card mt-5">
                    <div class="card-header">Create a new Book</div>
                    <div class="card-body">
                        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data" >@csrf

                            <label>Name of book</label>
                            <input type="text" name="name" class="form-control" placeholder="name of book">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br>
                            <label>Description of book</label>
                            <textarea name="description" class="form-control"></textarea>
                              @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                            <br>
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="">select</option>
                                <option value="frictional">Frictional Book</option>
                                <option value="biography">Biography Book</option>
                                <option value="comdey">Comdey Book</option>
                                <option value="educational">Education</option>
                            </select>
                            @if ($errors->has('category'))
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        @endif
                      

                            <br>
                            <input type="submit" value="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php  // ?>