<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @if(isset($level_1_title))
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        @if( isset($level_1_title_url) )
                        <li class="breadcrumb-item"><a href="{{$level_1_title_url}}">{{$level_1_title}}</a></li>
                        @else
                        <li class="breadcrumb-item">{{$level_1_title}}</li>
                        @endif
                        </li>
                    @endif
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
