@extends('layouts.auth')

@section('page-content')
<section style="background-color: #eee;">
    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="createPost" tabindex="-1" role="dialog" aria-labelledby="createPostTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Amazing Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="post_data" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="create_post" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center" id="post-list">
            <div>
                <button type="button" class="btn btn-success" style="float:right;margin: 40px" data-toggle="modal" data-target="#createPost">Create Post</button>
            </div>

            {{-- @dd($posts); --}}
            @foreach($posts as $post)
                <div class="col-md-12 col-lg-10 col-xl-8 mb-8">
                    <div class="card">
                        <div class="card-body">
                        <div class="d-flex flex-start align-items-center">
                            <img class="rounded-circle shadow-1-strong me-3"
                            src="{{ $post->image }}" alt="avatar" width="60"
                            height="60" />
                            <div>
                            <h6 class="fw-bold text-primary mb-1">{{ $post->title }}</h6>
                            <p class="text-muted small mb-0">
                                {{ $post->created_at }}
                            </p>
                            </div>
                        </div>

                        <p class="mt-3 mb-4 pb-2">
                            {{ $post->description }}
                        </p>

                        <div class="small d-flex justify-content-start">
                            <a href="#!" class="d-flex align-items-center me-3">
                            <i class="far fa-thumbs-up me-2"></i>
                            <p class="mb-0">Like</p>
                            </a>
                            <a href="#!" class="d-flex align-items-center me-3">
                            <i class="far fa-comment-dots me-2"></i>
                            <p class="mb-0">Comment</p>
                            </a>
                        </div>
                        </div>
                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <div class="d-flex flex-start w-100">
                            <img class="rounded-circle shadow-1-strong me-3"
                            src="{{ $post->image }}" alt="avatar" width="40"
                            height="40" />
                            <div class="w-100">
                            <label class="form-label" for="textAreaExample">Message</label>
                            <textarea class="form-control" id="textAreaExample" rows="4"
                                style="background: #fff;"></textarea>
                            </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <button type="button" class="btn btn-primary btn-sm">Post comment</button>
                            <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
  </section>
  @endsection

  @section('page-script')
  <script>
      $(document).ready(function(){
        var url = "/post";
        $('#post_data').on('submit',function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData(this);
            console.log(formData);
            $.ajax({
                type:'post',
                data: formData,
                url: url,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    // console.log('res',res)
                    if(data){
                        // console.log(data);

                    var post =   '<div class="col-md-12 col-lg-10 col-xl-8 mb-8">'+
                                    '<div class="card">' +
                                        '<div class="card-body">' +
                                        '<div class="d-flex flex-start align-items-center">' +
                                            '<img class="rounded-circle shadow-1-strong me-3" src="' +data.image +'" alt="avatar" width="60" height="60" />' +
                                            '<div>' +
                                                '<h6 class="fw-bold text-primary mb-1">' + data.title + '</h6>' +
                                                '<p class="text-muted small mb-0">' + data.created_at + '</p>' +
                                            '</div>' +
                                        '</div>' +
                                        '<p class="mt-3 mb-4 pb-2">' + data.description + '</p>' +

                                        '<div class="small d-flex justify-content-start">' +
                                            '<a href="#!" class="d-flex align-items-center me-3">' +
                                                '<i class="far fa-thumbs-up me-2"></i>' +
                                                '<p class="mb-0">Like</p>' +
                                            '</a>' +
                                            '<a href="#!" class="d-flex align-items-center me-3">' +
                                                '<i class="far fa-comment-dots me-2"></i>' +
                                                '<p class="mb-0">Comment</p>' +
                                            '</a>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">' +
                                        '<div class="d-flex flex-start w-100">' +
                                            '<img class="rounded-circle shadow-1-strong me-3" src="' + data.image + '" alt="avatar" width="40" height="40" />' +
                                            '<div class="w-100">' +
                                                '<label class="form-label" for="textAreaExample">Message</label>' +
                                                '<textarea class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="float-end mt-2 pt-1">' +
                                            '<button type="button" class="btn btn-primary btn-sm">Post comment</button>' +
                                            '<button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>' +
                                        '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';

                                $('#post-list').append(post);

                                $('#createPost').modal().hide();
                                $('.modal-backdrop').remove();

                    }
                }

            })
        });
    });
  </script>
  @endsection
