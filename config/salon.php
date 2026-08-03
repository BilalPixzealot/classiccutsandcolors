<?php

/*
|--------------------------------------------------------------------------
| Salon content / business data
|--------------------------------------------------------------------------
| Single source of truth for all business information rendered across the
| site (NAP, hours, services, brands, testimonials). Keeping it here means
| copy changes never require touching Blade markup — edit once, reflected
| everywhere, and it powers the SEO structured data too.
*/

return [

    'name'      => 'Classic Cuts & Colors',
    'tagline'   => 'Eltham Village · Hair Studio',
    'suburb'    => 'Eltham',

    // Contact / NAP (Name-Address-Phone) — used in markup and JSON-LD schema.
    'phone'         => '(03) 9439 6002',
    'phone_e164'    => '+61394396002',
    'phone_tel'     => '0394396002',
    'email'         => 'info@classiccutsandcolors.com.au',

    'address' => [
        'line1'    => 'Shop 3, Eltham Village Shopping Centre',
        'line2'    => '906 Main Rd',
        'locality' => 'Eltham',
        'region'   => 'VIC',
        'postcode' => '3095',
        'country'  => 'AU',
        'note'     => 'Three shops from Coles · undercover parking',
    ],

    // Opening hours — display strings + machine-readable spec for schema.
    'hours' => [
        'display' => [
            'Mon – Wed' => '9am – 5pm',
            'Thursday'  => '9am – 5:30pm',
            'Friday'    => '9am – 5pm',
            'Saturday'  => '9am – 4pm',
            'Sunday'    => 'Closed',
        ],
        // schema.org openingHoursSpecification
        'spec' => [
            ['days' => ['Monday', 'Tuesday', 'Wednesday', 'Friday'], 'opens' => '09:00', 'closes' => '17:00'],
            ['days' => ['Thursday'], 'opens' => '09:00', 'closes' => '17:30'],
            ['days' => ['Saturday'], 'opens' => '09:00', 'closes' => '16:00'],
        ],
    ],

    // Rolling treatment words for the hero marquee.
    'marquee' => [
        'Balayage', 'Foils', 'Lived-in colour', 'Gloss & toner',
        'Nanoplasty', 'Hair Botox', 'Formaldehyde-Free Keratin',
        'Blow waves', 'Restyle', 'Fashion colour', 'Updos',
    ],

    // Service menu — "from" pricing pulled from the salon price list.
    'services' => [
        ['name' => 'Cuts',              'desc' => 'Ladies, men, students & kids · restyles & fringes', 'from' => 30,  'swatch' => 'sw-cut'],
        ['name' => 'Colour',            'desc' => 'Tints, semi, toner, root stretch & fashion colour',  'from' => 75,  'swatch' => 'sw-colour'],
        ['name' => 'Foils & Balayage',  'desc' => 'Highlights, half to full head & balayage',           'from' => 70,  'swatch' => 'sw-foils'],
        ['name' => 'Blow Waves',        'desc' => 'Wash, cut & dry off · GHD finish',                   'from' => 40,  'swatch' => 'sw-blow'],
        ['name' => 'Styling & Updos',   'desc' => 'Hair up, braids, curls & straightening',             'from' => 30,  'swatch' => 'sw-style'],
        ['name' => 'Packages',          'desc' => 'Tint & foils, perms & permanent straightening combos','from' => 100, 'swatch' => 'sw-pack'],
    ],

    'surcharge' => 'Please note: a $5 Saturday surcharge applies to all bills, including products and services.',

    // Work teaser (home) — [image basename, alt/caption]
    'work' => [
        ['img' => 'work-glass-hair', 'caption' => 'Glass-hair smooth'],
        ['img' => 'work-silver',     'caption' => 'Silver ombre'],
        ['img' => 'work-balayage',   'caption' => 'Balayage'],
        ['img' => 'work-honey',      'caption' => 'Honey balayage'],
        ['img' => 'work-updo',       'caption' => 'Occasion updo'],
        ['img' => 'work-curls',      'caption' => 'Blow-wave curls'],
    ],

    // Retail brands stocked in salon.
    'brands' => [
        ['name' => 'Juuce',   'desc' => 'Organic, Australian made',   'img' => 'brand-juuce'],
        ['name' => 'Pure',    'desc' => 'Organic scalp & hair care',  'img' => 'brand-pure'],
        ['name' => 'Sarah K', 'desc' => 'Nanoplasty & smoothing',     'img' => 'brand-sarah'],
    ],

    // Testimonials — placeholder copy until the live Google reviews feed is wired in.
    'reviews' => [
        ['quote' => 'Best colour I’ve had in years. They listened to exactly what I wanted and it grew out beautifully.', 'name' => 'Sarah M., Eltham'],
        ['quote' => 'Lovely salon, easy undercover parking, and my kids actually enjoy their haircuts now.',             'name' => 'Bianca T., Research'],
        ['quote' => 'Friendly, affordable and genuinely good at what they do. My whole family goes here.',               'name' => 'Karen L., Montmorency'],
    ],
    'rating' => ['value' => '4.8', 'count' => 90],
];
