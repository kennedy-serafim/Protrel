<div class="row justify-content-center {{ $align ?? 'text-center' }}">
    <div class="col-md-7 text-muted">
        &copy; {{ now()->year }}
        <a href="javascript:void(0)" class="font-weight-bold ml-1 {{$color ?? '' }} ">
            {{ config('app.name', 'Wimbo') }}.
        </a>
        {{ __('All Rights Reserved')}}<br />

        <div class="credits">
            {{__('Designed By')}}
            <a href="javascript:void(0)" class="font-weight-bold ml-1 {{$color ?? '' }} ">
                {{ config('app.owner', '@ACS Team') }}.
            </a>
        </div>
    </div>
</div>
