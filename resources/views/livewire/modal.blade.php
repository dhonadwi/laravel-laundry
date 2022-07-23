<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="modal fade" id="{{ $name }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{ $description }}</div>
                @if ($name == 'logoutModal')
                    <form action="/logout" method="POST">
                        @csrf
                        <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Logout</button>
                        </div>
                    </form>    
                @else
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-success">Yes</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
