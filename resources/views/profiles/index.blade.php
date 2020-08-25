@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class='d-flex align-items-center pb-3'>
                    <div class="h4">{{ $user->username }}</div>
                    
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}" ></follow-button>
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">A New Post</a>
                @endcan

            </div>
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan
            <div class="d-flex">
                <div class="pr-4"><strong> {{ $post_count }}</strong> posts</div>
                <div class="pr-4"><strong>{{ $followers_count }} </strong> followers</div>
                <div class="pr-4"><strong>{{ $following_count }} </strong> following/div>
            </div>
            <div>
                <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? "N/A" }}</div>
                <div>{{ $user->profile->description ?? "N/A"}}</div>
                <a href='#'>{{ $user->profile->url ?? "N/A" }}</a>
            </div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach ($user->posts as $post)
            
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach

        <!-- <div class="col-4">
            <img href="https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s150x150/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=db0a57e9d08dad668909eab2ea6753e6&amp;oe=5F5EB55D 150w" tabindex="0"><div class="eLAPa"><div class="KL4Bh"><img alt="Photo by freeCodeCamp.org on August 11, 2020. Image may contain: one or more people, people sitting and screen" class="FFVAD" decoding="auto" sizes="293px" srcset="https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s150x150/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=db0a57e9d08dad668909eab2ea6753e6&amp;oe=5F5EB55D 150w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s240x240/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=38cc6eea9e242fe8db2903a22b86a831&amp;oe=5F5EC595 240w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s320x320/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=84315e7184b17b87d1ada16ad10945e7&amp;oe=5F5CE74C 320w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s480x480/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=211d7261255d184f5e91eeee1548318e&amp;oe=5F5E1B0A 480w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c3.0.744.744a/s640x640/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=63a44b29087aed0a29369d63c99b7fcb&amp;oe=5F5DEA02 640w" src="https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c3.0.744.744a/s640x640/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=63a44b29087aed0a29369d63c99b7fcb&amp;oe=5F5DEA02" style="object-fit: cover;"></div><div class="_9AhH0"></div></div></a>
        </div>
        <div class="col-4">
            <img href="https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s150x150/117185734_730508550844355_4827964239716308767_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=111&amp;_nc_ohc=1Tt3EsxmUZwAX_F90D3&amp;oh=408dbffd9bb40a3cceff963d42f6e963&amp;oe=5F5B7F1C 150w" tabindex="0"><div class="eLAPa"><div class="KL4Bh"><img alt="Photo by freeCodeCamp.org on August 11, 2020. Image may contain: one or more people, people sitting and screen" class="FFVAD" decoding="auto" sizes="293px" srcset="https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s150x150/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=db0a57e9d08dad668909eab2ea6753e6&amp;oe=5F5EB55D 150w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s240x240/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=38cc6eea9e242fe8db2903a22b86a831&amp;oe=5F5EC595 240w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s320x320/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=84315e7184b17b87d1ada16ad10945e7&amp;oe=5F5CE74C 320w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s480x480/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=211d7261255d184f5e91eeee1548318e&amp;oe=5F5E1B0A 480w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c3.0.744.744a/s640x640/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=63a44b29087aed0a29369d63c99b7fcb&amp;oe=5F5DEA02 640w" src="https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c3.0.744.744a/s640x640/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=63a44b29087aed0a29369d63c99b7fcb&amp;oe=5F5DEA02" style="object-fit: cover;"></div><div class="_9AhH0"></div></div></a>
        </div>
        <div class="col-4">
            <img href="https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s150x150/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=db0a57e9d08dad668909eab2ea6753e6&amp;oe=5F5EB55D 150w" tabindex="0"><div class="eLAPa"><div class="KL4Bh"><img alt="Photo by freeCodeCamp.org on August 11, 2020. Image may contain: one or more people, people sitting and screen" class="FFVAD" decoding="auto" sizes="293px" srcset="https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s150x150/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=db0a57e9d08dad668909eab2ea6753e6&amp;oe=5F5EB55D 150w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s240x240/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=38cc6eea9e242fe8db2903a22b86a831&amp;oe=5F5EC595 240w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s320x320/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=84315e7184b17b87d1ada16ad10945e7&amp;oe=5F5CE74C 320w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/e35/c3.0.744.744a/s480x480/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=211d7261255d184f5e91eeee1548318e&amp;oe=5F5E1B0A 480w,https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c3.0.744.744a/s640x640/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=63a44b29087aed0a29369d63c99b7fcb&amp;oe=5F5DEA02 640w" src="https://instagram.fsin5-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c3.0.744.744a/s640x640/117243751_3191331930959937_4248390780708663081_n.jpg?_nc_ht=instagram.fsin5-1.fna.fbcdn.net&amp;_nc_cat=109&amp;_nc_ohc=gJwN-gzhtz0AX9NL7yI&amp;oh=63a44b29087aed0a29369d63c99b7fcb&amp;oe=5F5DEA02" style="object-fit: cover;"></div><div class="_9AhH0"></div></div></a>
        </div>
    </div> -->
</div>
@endsection
