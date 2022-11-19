{{-- 
    
    Recent Files
    ============
    
--}}

@cannot('cannotView', \App\Models\File::class)
<div class="card box-round shadow">
    <div class="card-body">
        <h5 class="text-muted">Recent Files</h5>

        <div class="mt-5">
            <div class="row row-eq-height m-0 p-0">

                @if ( sizeof( $documents ) > 0 )
                    @foreach ($documents as $document)
                                
                    <div class="col-lg-3 p-0">
                        <div class="card text-center border-0">
                            <div class="card-body h-100"> 
                                <div class="mb-3">
                                    <a href="{{ url('/files/download/' . $document->id ) }}" class="btn btn-outline-secondary me-3">
                                        <small><i class="fa fa-download"></i></small>
                                        <small><span class="text-uppercase">Download</span></small>
                                    </a>

                                    @can('delete', \App\Models\File::class)
                                    <a onclick="return window.confirm('Are you sure?')" href="{{ url('/files/remove/' . $document->id ) }}" class="btn btn-outline-secondary">
                                        <small><i class="fa fa-eraser"></i></small>
                                        <small><span class="text-uppercase">Remove</span></small>
                                    </a>
                                    @endcan

                                </div>       
                                <div class="icon-shape bg-rose my-4 icon-shape-medium">
                                    <i class="{{ filetype_icons($document->file_mime) }}"></i>
                                </div>
                                <div>
                                    <span>{{ $document->file_name }}</span>
                                </div>
                                <div>
                                    <small class="text-muted text-uppercase">
                                        {{ $document->user->name }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                @else
                    <p class="text-muted text-uppercase p-0">
                        No assigned documents to this user!
                    </p>
                @endif
     
            </div>
        </div>
    </div>
</div>
@endcannot


