@extends('layouts.app')

@section('title-block')
    Додавання студентів
@endsection

@section('content')

    <div class="side-body padding-top">
            <h2 class="text-center mt-5">Додати Курс</h2>
            <hr class="">
        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <!-- form start -->
                        <form role="form" class="form-edit-add" action="{{route('add_course')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">Група</label>
                                        <select class="form-select" name="group">
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->tag}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="name" class="form-label">Назва курсу</label>
                                        <input type="text" class="form-control" name="name" placeholder="" value="" required="">
                                    </div>
                                </div>

                                <div class="form-group  col-md-12 mt-3">
                                    <label class="form-label" for="name">Опис курса</label>
                                    <textarea class="form-control" name="description" rows="5"></textarea>
                                </div>
                                <br><br>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Аватар курсу</label>
                                    <input class="form-control" type="file" accept="image/*" name="img" multiple>
                                </div>
                            </div><!-- panel-body -->
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-success save">Зберегти</button>
                            </div>
                        </form>

                        <iframe id="form_target" name="form_target" style="display:none"></iframe>
                        <form id="my_form" action="http://127.0.0.1:8000/admin/upload" target="form_target" method="post" enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                            <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
                            <input type="hidden" name="type_slug" id="type_slug" value="movies">
                            <input type="hidden" name="_token" value="x1hfsmgemkWNhY81WkXQu9oMmitQ62TZeCsr0Icg">
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-danger" id="confirm_delete_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"><i class="voyager-warning"></i> Are you sure</h4>
                    </div>

                    <div class="modal-body">
                        <h4>Are you sure you want to delete '<span class="confirm_delete_name"></span>'</h4>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirm_delete">Yes, Delete it!</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
