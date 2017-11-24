@inject('countries','App\Models\Country')

<div class="container section">
    <h2>Explore Our Best Destinations</h2>
    <div class="row image-box style10">

        @forelse($countries->orderBy('name')->get() as $country)
        <div class="col-sms-6 col-sm-6 col-md-3">
            <article class="box">
                <figure class="animated" data-animation-type="fadeInDown" data-animation-duration="2">
                    <a href="{{ route('site.destination.country', $country->slug) }}" title="{{ $country->name }}" class="hover-effect"><img src="{{ asset('storage/country/'.$country->slug.'/'.$country->image) }}" alt="" width="270" height="160" /></a>
                </figure>
                <div class="details">
                    <a href="{{ route('site.destination.country', $country->slug) }}" class="button btn-mini">SEE ALL</a>
                    <h4 class="box-title">{{ $country->name }}<small>({{ $country->cities->count() }} cities)</small></h4>
                </div>
            </article>
        </div>
        @empty
        <div class="col-sms-12">
            No records found.
        </div>
        @endforelse
    </div>
</div>