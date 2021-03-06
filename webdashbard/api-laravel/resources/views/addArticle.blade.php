@extends('master')
@section('main')
<div class="panel panel-primary" style="margin-top:50px">
    <form action="{!! route('article.store') !!}" method="POST" enctype="multipart/form-data">
        <div class="panel-body">
            <legend><h2>Tạo Bài Viết Mới </h2></legend>
            Tiêu Đề Bài Đăng:
            <textarea class="form-control" rows="3" name="Title" ></textarea><br/>
            @if($errors->has('Title'))
            <p style="color: red">{{$errors->first('Title')}}</p>
            @endif
            Mô Tả Ngắn Gọn Bài Đăng: <br/>`
            <textarea class="form-control" rows="4" name = "Description" id="Description"></textarea><br/>
            @if($errors->has('Description'))
            <p style="color: red">{{$errors->first('Description')}}</p>
            @endif
            Hình ảnh tiêu đề: <input type="file" id='image' name="image" onchange="readURL(this);"> <br />
            <img id="blah" height="150px" src="{{asset('image/upload_photo.png')}}" alt="your image" /><br /> <br/>
            @if($errors->has('image'))
            <p style="color: red">{{$errors->first('image')}}</p>
            @endif
            Nội Dung Bài Đăng: <br/>
            <textarea name="content" id="content" >This is content ...</textarea>
            @if($errors->has('content'))
            <p style="color: red">{{$errors->first('content')}}</p>
            @endif
            <script>
                CKEDITOR.replace( 'content',{ filebrowserBrowseUrl: '/browser/browse.php'
                                ,filebrowserUploadUrl: '/uploader/upload.php'});
                var data = CKEDITOR.instances.text.getData();
            </script>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{-- @csrf
            <input type = "hidden" name="_token" value="{{ csrf_field() }}" > --}}
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-primary">Đăng bài</button>
        </div>
    </form>
</div>
@stop
