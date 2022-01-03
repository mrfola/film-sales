<section class="section main-section">
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">

        <x-admin.card title="No Of Films Purchased" content="{{$total_no_of_films}}">  
            <x-slot name="icon">
                <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
            </x-slot>
        </x-admin.card>

        <x-admin.card title="Total Sales For This Month" content="# {{$monthly_sales}}">  
            <x-slot name="icon">
                <span class="icon widget-icon text-green-500"><i class="mdi mdi-finance mdi-48px"></i></span>
            </x-slot>
        </x-admin.card>

    </div>
  </section>