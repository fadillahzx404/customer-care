@extends('layouts.app')
@section('title')
    Add Ticket Support
@endsection
@section('page-content')
    <div class="container px-12 pb-36 pt-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="user-created card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">
                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Add Ticket Support</p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <form action="{{ route('support-user.store') }}" method="POST" class="grid gap-3"
                    enctype="multipart/form-data">
                    @csrf


                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}"
                        class="input input-bordered input-neutral w-full focus:outline-offset-0 focus:border-neutral" />



                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Category Supports</span>
                        </label>
                        <select name="id_cat_services"
                            class="select select-bordered select-neutral w-full focus:outline-offset-0 focus:border-neutral">
                            @foreach ($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name_services }}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Description Problem</span>
                        </label>
                        <textarea type="text" name="description" placeholder="Deskripsi Permasalahan.."
                            class="textarea textarea-bordered textarea-neutral w-full focus:outline-offset-0 focus:border-neutral"></textarea>
                    </div>


                    <div class="form-control image-up">

                        <label for="files" class="label">
                            <span class="label-text">Upload image</span>

                        </label>

                        <input type="file" accept="image/*" onchange="preview(this)"
                            class="file-input file-input-bordered file-input-neutral w-full  focus:outline-offset-0 focus:border-neutral"
                            multiple name="photo_support" />





                        <div class="preview-area flex flex-row gap-2 justify-center"></div>

                    </div>





                    <div class="flex flex-row gap-2 mt-10 justify-end">
                        <a href="{{ route('category-services.index') }}"
                            class="btn btn-sm btn-error transition duration-300 hover:scale-90">Cancel</a>
                        <button class="btn btn-sm px-5 btn-success text-white transition duration-300 hover:scale-90"
                            type="submit">Save</button>
                    </div>

                </form>
            </div>
        </section>

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
