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
    'abn'       => '32 695 875 462',

    // Contact / NAP (Name-Address-Phone) — used in markup and JSON-LD schema.
    'phone'         => '(03) 9439 6002',
    'phone_e164'    => '+61394396002',
    'phone_tel'     => '0394396002',
    'email'         => 'contact@classiccutsandcolors.com.au',

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
            'Mon to Wed' => '9am – 5pm',
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

    // Gallery ("The Work") — grouped by category. [image basename, category, caption]
    'gallery' => [
        ['img' => 'g01', 'cat' => 'colour',    'cap' => 'Balayage'],
        ['img' => 'g02', 'cat' => 'colour',    'cap' => 'Blonde balayage'],
        ['img' => 'g03', 'cat' => 'colour',    'cap' => 'Bright blonde'],
        ['img' => 'g04', 'cat' => 'colour',    'cap' => 'Blonde foils'],
        ['img' => 'g05', 'cat' => 'colour',    'cap' => 'Caramel balayage'],
        ['img' => 'g06', 'cat' => 'colour',    'cap' => 'Lived-in brunette'],
        ['img' => 'g07', 'cat' => 'colour',    'cap' => 'Honey balayage'],
        ['img' => 'g08', 'cat' => 'colour',    'cap' => 'Silver ombre'],
        ['img' => 'g09', 'cat' => 'smoothing', 'cap' => 'Smoothing treatment'],
        ['img' => 'g10', 'cat' => 'smoothing', 'cap' => 'Keratin smooth'],
        ['img' => 'g11', 'cat' => 'smoothing', 'cap' => 'Glass-hair finish'],
        ['img' => 'g12', 'cat' => 'smoothing', 'cap' => 'Sleek & straight'],
        ['img' => 'g13', 'cat' => 'smoothing', 'cap' => 'Frizz-free smooth'],
        ['img' => 'g14', 'cat' => 'smoothing', 'cap' => 'Smoothing treatment'],
        ['img' => 'g15', 'cat' => 'smoothing', 'cap' => 'Layered & sleek'],
        ['img' => 'g16', 'cat' => 'smoothing', 'cap' => 'Nanoplasty smooth'],
        ['img' => 'g17', 'cat' => 'smoothing', 'cap' => 'Smooth blow-dry'],
        ['img' => 'g18', 'cat' => 'smoothing', 'cap' => 'Straightened & shiny'],
        ['img' => 'g19', 'cat' => 'updos',     'cap' => 'Occasion updo'],
        ['img' => 'g20', 'cat' => 'updos',     'cap' => 'Braided updo'],
        ['img' => 'g21', 'cat' => 'updos',     'cap' => 'Soft curls'],
        ['img' => 'g22', 'cat' => 'updos',     'cap' => 'Blow-wave curls'],
        ['img' => 'g23', 'cat' => 'updos',     'cap' => 'Styled finish'],
        ['img' => 'g24', 'cat' => 'updos',     'cap' => 'Volume & curls'],
    ],
    'gallery_categories' => [
        'colour'    => ['label' => 'Colour & balayage',        'blurb' => 'Blondes, brunettes, caramels and lived-in tones. Colour built to grow out softly.'],
        'smoothing' => ['label' => 'Frizz, tamed.',            'blurb' => 'Nanoplasty, Hair Botox and formaldehyde-free keratin for smooth, glossy, low-effort hair.'],
        'updos'     => ['label' => 'Finished & occasion-ready.', 'blurb' => 'Blow-waves, curls, braids and updos for every event on the calendar.'],
    ],

    // Retail shop — brands and the ranges we stock (product photography TBC).
    'shop' => [
        [
            'id' => 'juuce', 'name' => 'Juuce', 'img' => 'brand-juuce',
            'eyebrow' => 'Organic · Australian made',
            'tag' => 'Our house favourite: organic, Australian-made care for every hair type, and gentle on colour.',
            'products' => [
                ['name' => 'Toning Shampoo',        'desc' => 'Keeps blondes cool and brunettes rich between visits.'],
                ['name' => 'Hydrating Conditioner', 'desc' => 'Daily moisture for soft, manageable lengths.'],
                ['name' => 'Repair Treatment Mask', 'desc' => 'Weekly rebuild for coloured and heat-styled hair.'],
                ['name' => 'Styling Oil',           'desc' => 'Lightweight shine and frizz control to finish.'],
            ],
        ],
        [
            'id' => 'pure', 'name' => 'Pure', 'img' => 'brand-pure',
            'eyebrow' => 'Everyday essentials',
            'tag' => 'Clean, simple staples for wash-day. The reliable basics every routine needs.',
            'products' => [
                ['name' => 'Daily Shampoo',      'desc' => 'Gentle enough for everyday cleansing.'],
                ['name' => 'Daily Conditioner',  'desc' => 'Smooths and detangles without weighing hair down.'],
                ['name' => 'Moisture Treatment', 'desc' => 'A midweek boost for thirsty ends.'],
                ['name' => 'Flexible Hairspray', 'desc' => 'All-day hold with a natural, brushable finish.'],
            ],
        ],
        [
            'id' => 'sarah', 'name' => 'Sarah K', 'img' => 'brand-sarah',
            'eyebrow' => 'Styling & finishing',
            'tag' => 'Texture, grip and shine. The finishing range for creating the look at home.',
            'products' => [
                ['name' => 'Sea Salt Spray',  'desc' => 'Effortless, beachy texture in a spritz.'],
                ['name' => 'Texture Paste',   'desc' => 'Pliable hold and matte definition.'],
                ['name' => 'Dry Shampoo',     'desc' => 'Refresh and add body between washes.'],
                ['name' => 'Finishing Spray', 'desc' => 'A polished, long-lasting set.'],
            ],
        ],
    ],

    /*
    | Booking link — the client's online booking URL. When null, "Book a chair"
    | buttons fall back to the Visit/contact page. Set this once and every CTA
    | across the site updates.
    */
    'booking_url' => env('SALON_BOOKING_URL', null),

    // Full price list (Services page). Categories → sub-groups → rows of [service, price].
    'pricelist' => [
        ['group' => 'Women', 'id' => 'women', 'chip' => 'Women', 'subs' => [
            ['title' => 'Haircuts', 'rows' => [
                ['Ladies', '$47–50'], ['Ladies (Mon–Fri)', '$45'],
                ['Restyle', '+$5–10'], ['Fringe / neck trim', '$10–15'],
            ]],
            ['title' => 'Wash, cut & dry', 'rows' => [['Wash, cut & dry', '$65']]],
            ['title' => 'Cut & blow wave', 'rows' => [
                ['Short', '$70–75'], ['Medium', '$80'], ['Medium to long', '$85'], ['Long', '$95'],
            ]],
            ['title' => 'Blow waves', 'rows' => [
                ['Very short', '$40'], ['Short to medium', '$45'], ['Medium to long', '$50–55'],
                ['Long', '$65'], ['Extra long', '$75+'], ['GHD finish', '+$5–15'],
            ]],
        ]],
        ['group' => 'Colour', 'id' => 'colour', 'chip' => 'Colour', 'subs' => [
            ['title' => 'Colour services', 'rows' => [
                ['Tint regrowth', '$75+'], ['Semi-permanent', '$75'], ['Fashion colour', '$85+'],
                ['Scalp bleach', '$90'], ['Root stretch / ombre', '$220'], ['Toner', '$20–45'],
                ['Additional colour', '$15+'],
            ]],
            ['title' => 'Foils & balayage', 'rows' => [
                ['8 foil highlights', '$70'], ['Half head', '$90–130'], ['Three-quarter head', '$140–170'],
                ['Full head', '$180–280'], ['Scattered foils', '$150–180'], ['Tip cap', '$80+'],
                ['Balayage & blow wave', '$240'],
            ]],
        ]],
        ['group' => 'Treatments', 'id' => 'treatments', 'chip' => 'Treatments', 'subs' => [
            ['title' => null, 'rows' => [
                ['Nanoplasty', 'On consultation'], ['Hair Botox', 'On consultation'],
                ['Formaldehyde-free keratin', 'On consultation'],
                ['Perm', 'On consultation'], ['Chemical straightening', 'On consultation'],
            ]],
        ]],
        ['group' => 'Styling', 'id' => 'styling', 'chip' => 'Styling', 'subs' => [
            ['title' => null, 'rows' => [
                ['Hair up', '$55–80+'], ['French braid', '$25–50'], ['Braid & curls', '$75'],
                ['Straightening irons', '$30'], ['GHD curls', '$40–50'],
            ]],
        ]],
        ['group' => 'Men', 'id' => 'men', 'chip' => 'Men', 'subs' => [
            ['title' => 'Haircuts', 'rows' => [["Men's cut", '$35'], ['Clippers', '$27']]],
            ['title' => 'Wash, cut & dry', 'rows' => [['Wash, cut & dry', '$38']]],
        ]],
        ['group' => 'Kids & students', 'id' => 'kids', 'chip' => 'Kids', 'subs' => [
            ['title' => 'Haircuts', 'rows' => [['School students', '$34–40'], ['Kids (under 7)', '$30']]],
            ['title' => 'Wash, cut & dry', 'rows' => [['School students', '$60'], ['Kids (under 7)', '$50']]],
        ]],
        ['group' => 'Packages', 'id' => 'packages', 'chip' => 'Packages', 'subs' => [
            ['title' => null, 'rows' => [
                ['Tint & 4 foils', '$100'], ['Tint, trim & dry off', '$135'], ['Tint & scattered foils', '$170'],
                ['Perm, cut & body wave', '$150+'], ['Permanent straightening & trim', '$300+'],
            ]],
        ]],
    ],

    // Gift card denominations (Gift Cards page).
    'giftcard' => [
        'amounts' => [50, 100, 150, 200],
    ],
];
