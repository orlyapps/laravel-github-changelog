<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - Changelog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.2.x/dist/typography.min.css" />
</head>

<body>

    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <h1 class="text-lg leading-6 font-semibold text-gray-900">
                    <h1 class="text-4xl font-bold">{{ env('APP_NAME') }} - Changelog</h1>
                </h1>
            </div>
        </header>
        <div class="py-6">
            <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">

                <main class="lg:col-span-8">
                    <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
                        <article>
                            <div class="space-y-10 sm:space-y-12 lg:space-y-20 xl:space-y-24">

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

                </main>
                <aside class="hidden lg:block lg:col-span-4">
                    <div class="sticky top-6 space-y-4">
                        <section aria-labelledby="announcements-title">
                            <div class="rounded-lg bg-white overflow-hidden shadow">
                                <div class="p-6">
                                    <h2 class="text-lg font-medium text-gray-900" id="announcements-title">
                                        Releases
                                    </h2>
                                    <div class="mt-6">
                                        <ul class="-my-5 divide-y divide-gray-200">
                                            @foreach($releases as $release)
                                            <li class="py-5">
                                                <div class="relative ">
                                                    <h3 class="text-sm font-semibold text-gray-800">

                                                        <!-- Extend touch target to entire panel -->

                                                        {{ $release['name'] }}


                                                    </h3>
                                                    <time datetime="2021-01-27T16:35"
                                                        class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">{{ $release['created_at'] }}</time>
                                                    <div class="mt-1 text-sm text-gray-600 prose">
                                                        {!! $release['body'] !!}
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach





                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </section>


                    </div>
                </aside>
            </div>
        </div>
    </div>

</body>

</html>
