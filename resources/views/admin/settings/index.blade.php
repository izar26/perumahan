<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Website') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-lg font-medium mb-4">Profil Perusahaan</h3>
                                <div class="mt-4">
                                    <x-input-label for="company_name" value="Nama Perusahaan" />
                                    <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="$settings['company_name']->value ?? ''" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="company_address" value="Alamat" />
                                    <textarea id="company_address" name="company_address" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $settings['company_address']->value ?? '' }}</textarea>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="company_phone" value="No. Telepon" />
                                    <x-text-input id="company_phone" class="block mt-1 w-full" type="text" name="company_phone" :value="$settings['company_phone']->value ?? ''" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="company_email" value="Email" />
                                    <x-text-input id="company_email" class="block mt-1 w-full" type="email" name="company_email" :value="$settings['company_email']->value ?? ''" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="company_logo" value="Logo Perusahaan" />
                                    @if(isset($settings['company_logo']) && $settings['company_logo']->value)
                                        <img src="{{ Storage::url($settings['company_logo']->value) }}" alt="Logo" class="h-16 w-auto my-2">
                                    @endif
                                    <input id="company_logo" name="company_logo" type="file" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                    <small class="text-gray-500">Kosongkan jika tidak ingin mengubah logo.</small>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium mb-4">Media Sosial & Maps</h3>
                                <div class="mt-4">
                                    <x-input-label for="social_instagram" value="Instagram URL" />
                                    <x-text-input id="social_instagram" class="block mt-1 w-full" type="url" name="social_instagram" :value="$settings['social_instagram']->value ?? ''" placeholder="https://instagram.com/..." />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="social_tiktok" value="TikTok URL" />
                                    <x-text-input id="social_tiktok" class="block mt-1 w-full" type="url" name="social_tiktok" :value="$settings['social_tiktok']->value ?? ''" placeholder="https://tiktok.com/@..." />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="social_facebook" value="Facebook URL" />
                                    <x-text-input id="social_facebook" class="block mt-1 w-full" type="url" name="social_facebook" :value="$settings['social_facebook']->value ?? ''" placeholder="https://facebook.com/..." />
                                </div>
                                <div class="mt-4">
    <div class="flex justify-between items-center">
        <x-input-label for="maps_embed" value="Lokasi Google Maps" />
        <a href="https://www.google.com/maps" target="_blank" class="text-sm text-blue-600 hover:underline">
            Buka Google Maps &rarr;
        </a>
    </div>
    <textarea id="maps_embed" name="maps_embed" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder='<iframe src="..."></iframe>'>{{ $settings['maps_embed']->value ?? '' }}</textarea>
</div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <x-primary-button>
                                Simpan Pengaturan
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>