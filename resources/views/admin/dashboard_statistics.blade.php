<section class="section main-section">
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">

        <x-admin.card title="Clients" content="512">  
            <x-slot name="icon">
                <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
            </x-slot>
        </x-admin.card>

        <x-admin.card title="Sales" content="$7,770">  
            <x-slot name="icon">
                <span class="icon widget-icon text-green-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
            </x-slot>
        </x-admin.card>

        <x-admin.card title="Performance" content="256%">  
            <x-slot name="icon">
                <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
            </x-slot>
        </x-admin.card>
    </div>
  </section>