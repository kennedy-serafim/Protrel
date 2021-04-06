<div class="header pb-8 pt-5 pt-md-8" style="background-image: url({{ asset('assets/img/hero-bg.jpg') }}); background-size: cover; background-position: center top;">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row justify-content-center">

                @role('Administrators')
                @include('administrators.cards')

                @elserole('Musicians')
                @include('musicians.cards')

                @elserole('Clients')
                @include('musicians.cards')

                @endrole

            </div>
        </div>
    </div>
</div>
