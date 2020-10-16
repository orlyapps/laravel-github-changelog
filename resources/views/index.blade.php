<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - Changelog</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@tailwindcss/typography@0.2.x/dist/typography.min.css" />
</head>

<body>
    <div id="__next">
        <div class="antialiased text-gray-900">
            <div class="px-4 py-10 max-w-3xl mx-auto sm:px-6 sm:py-12 lg:max-w-4xl lg:py-16 lg:px-8 xl:max-w-6xl">
                <article>
                    <div class="space-y-10 sm:space-y-12 lg:space-y-20 xl:space-y-24">
                        <div class="space-y-10 sm:space-y-0 sm:flex sm:items-center sm:justify-between">
                            <h1 class="text-4xl font-bold">{{ env('APP_NAME') }} - Changelog</h1>
                        </div>
                        <div class="prose prose-lg mx-auto">
                            @foreach($changelog as $date => $group)
                            <h2>{{ $date }}</h2>
                            @foreach($group as $groupName => $commits)
                            <h3>{{ $groupName }}</h3>

                            <ul>
                                @foreach($commits as $commit)
                                <li><strong>{{ $commit['scope'] }}</strong>: {{ $commit['subject'] }}</li>
                                @endforeach
                            </ul>
                            @endforeach
                            @endforeach


                        </div>
                        @if($history)
                        <div class="space-y-10 sm:space-y-0 sm:flex sm:items-center sm:justify-between">
                            <h1 class="text-4xl font-bold">History</h1>
                        </div>
                        <div class="prose mx-auto">
                            {!! $history !!}
                        </div>
                        @endif
                    </div>
                </article>
            </div>
        </div>
    </div>
</body>

</html>
