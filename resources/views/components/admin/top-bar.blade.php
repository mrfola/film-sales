<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 flex flex-row flex-nowrap gap-10 pt-6">

                <div class="basis-5/6">
                    <a href="{{ isset($attributes->href) ? $attributes->href : url()->previous() }}" class="text-sky-600 font-black">
                        {{ isset($link) ? $link : "< Back" }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
