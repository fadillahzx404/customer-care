@extends('layouts.app')
@section('title')
    Ticket Support
@endsection
@section('page-content')
    <div class="container px-12 pb-36 pt-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen grid gap-5">
        <section class="user-created card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">
                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Ticket Support <span class="font-black">{{ $data[0]->id }}</span></p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <div class="grid gap-3"></div>






                <div class="form-control grid grid-cols-4">
                    <p class="pl-1 col-span-1 text-gray-500 hover:text-gray-900 self-center">Category Services</p>
                    <p class="text-black text-lg font-bold col-span-2 self-center">:
                        {{ $data[0]->categoryServices->name_services }}
                    </p>

                    <div class="div place-self-end">


                        <a href="#my_modal_8" class=""><img
                                src="{{ asset('storage/' . $data[0]->photoSupport->photo) }}" class="rounded-md"
                                alt=""></a>
                    </div>

                    <!-- Put this part before </body> tag -->

                    <div class="modal" role="dialog" id="my_modal_8">
                        <div class="modal-box w-11/12 max-w-5xl ">
                            <img src="{{ asset('storage/' . $data[0]->photoSupport->photo) }}" alt="">
                            <div class="modal-action">
                                <a href="#" class="btn btn-sm btn-warning">Back</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-control grid grid-cols-4 jus">
                    <p class="pl-1 col-span-1 text-gray-500 hover:text-gray-900 self-center">Status</p>
                    <p class="text-black text-lg font-bold col-span-2 self-center">:
                        <span
                            class="badge badge-md text-white @switch($data[0]->status)
                                    @case('Menunggu Di Balas Oleh Admin.')
                                        badge-primary
                                        @break
                                    @case('Menunggu Di Balas Oleh Anda.')
                                        badge-info
                                        @break
                                    @case('Ticket Support Telah Ditutup.')
                                        badge-success
                                        @break

                                    @default
                                        badge-error

                                @endswitch">{{ $data[0]->status == 'Menunggu Dibalas Oleh Anda.' ? 'Menunggu Dibalas Oleh User.' : $data[0]->status }}</span>
                    </p>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-gray-500 hover:text-gray-900">Description Problem</span>
                    </label>
                    <textarea type="text" name="description" readonly
                        class="textarea text-md textarea-ghost focus:outline-0 focus:border-none w-full ">{{ $data[0]->description }}</textarea>


                </div>
            </div>
        </section>
        <?php
        $check = $data[0]->SupportDetails[0] ?? null;
        ?>
        @if ($check)
            <section class="balasan-sebelumnya card card-compact bg-white shadow-xl rounded-md">
                <div class="card-body">
                    <div class="grid title gap-2">
                        <p class="text-lg font-medium">Balasan</p>
                        <hr class="mb-3 border-gray-300" />
                    </div>


                    <div class="grid gap-3">
                        @foreach ($data[0]->supportDetails as $item)
                            <div class="form-control">
                                <label class="label">
                                    @if ($item->user->roles == 'ADMIN')
                                        <span class="label-text text-gray-900 text-lg">Balasan Admin</span>
                                        <span class="label-text text-gray-900 text-lg"></span>
                                    @else
                                        <span class="label-text text-gray-900 text-lg"></span>
                                        <span class="label-text text-gray-900 text-lg">Balasan User</span>
                                    @endif
                                </label>
                                <div class="border-2 rounded-md grid gap-5">
                                    <textarea type="text" name="description" readonly
                                        class="textarea text-md textarea-neutral focus:outline-0 focus:border-none w-full">{{ $item->description }}</textarea>
                                    <hr class="border-1 mx-2">
                                    <div class="button place-self-end pb-2 px-2">
                                        <a href="#my_modal_8-{{ $item->id }}" class="btn btn-neutral btn-sm">Photo
                                            Details</a>
                                    </div>

                                    <!-- Put this part before </body> tag -->

                                    <div class="modal" role="dialog" id="my_modal_8-{{ $item->id }}">
                                        <div class="modal-box w-11/12 max-w-5xl ">
                                            <img src="{{ asset('storage/' . $item->photo_details) }}" alt="">
                                            <div class="modal-action">
                                                <a href="#" class="btn btn-sm btn-warning">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </section>
        @endif

        @switch($data[0]->status)
            @case('Menunggu Di Balas Oleh Anda.')
                <section class="tambah-balasan card card-compact bg-white shadow-xl rounded-md">
                    <div class="card-body">
                        <div class="grid title gap-2">
                            <p class="text-lg font-medium">Tambah Balasan</p>
                            <hr class="mb-3 border-gray-300" />
                        </div>



                        <form action="{{ route('support-user.update', $data[0]->id) }}" method="POST" class="grid gap-3"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}"
                                class="input input-bordered input-neutral w-full focus:outline-offset-0 focus:border-neutral" />

                            <div class="form-control" id="tambah_balasan">
                                <label class="label">
                                    <span class="label-text text-gray-500 hover:text-gray-900">Balasan Anda</span>
                                    <span class="label-text text-gray-500 hover:text-gray-900"></span>
                                </label>
                                <div class="border-2 rounded-md grid gap-5">
                                    <textarea type="text" name="description"
                                        class="textarea text-md textarea-neutral focus:outline-0 focus:border-none w-full"></textarea>


                                    <div class="form-control image-up p-4">

                                        <label for="files" class="label">
                                            <span class="label-text">Upload image</span>
                                            <span class="label-text text-red-500">*Optional menambkan gambar.</span>

                                        </label>

                                        <input type="file" accept="image/*" onchange="preview(this)"
                                            class="file-input file-input-bordered file-input-neutral w-full  focus:outline-offset-0 focus:border-neutral"
                                            multiple name="photo_details" />





                                        <div class="preview-area flex flex-row gap-2 justify-center"></div>

                                    </div>

                                </div>
                            </div>

                            <div class="flex flex-row gap-2 mt-10 justify-end">
                                <a href="{{ route('support-user.index') }}"
                                    class="btn btn-sm btn-error transition duration-300 hover:scale-90">Cancel</a>
                                <button class="btn btn-sm px-5 btn-success text-white transition duration-300 hover:scale-90"
                                    type="submit">Save</button>
                            </div>
                        </form>

                    </div>
                </section>
            @break

            @default
        @endswitch



        @if ($data[0]->status == 'Ticket Support Telah Ditutup.')
            <div class="flex flex-row gap-2 mt-2 justify-end">
                <a href="{{ route('support-admin.index') }}"
                    class="btn btn-sm btn-warning transition duration-300 hover:scale-90">Kembali</a>
            </div>
        @endif

    </div>
@endsection

@push('addon-script')
    <script>
        function preview(elem, output = '') {
            Array.from(elem.files).map((file) => {
                const blobUrl = window.URL.createObjectURL(file)
                output += `<img class='h-8/12 w-8/12 border-2 mt-3 rounded-md' src=${blobUrl}>`
            })
            elem.nextElementSibling.innerHTML = output
        }
    </script>
@endpush
