<x-layout>

    <div class="content-container text-center  px-10  mt-2">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">add Lead</h2>
            {{-- <p class="mb-4">Edit:</p> --}}
        </header>

        <form method="POST" class="w-4/5 mx-auto" action="{{ route('lead.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-6">


            </div>
            <div class="input_container flex space-x-4">
                <div class="flex-1 ">
                    <label for="company" class="block float-left text-lg mb-2">Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                        value="" />
                </div>
                <div class="flex-1">
                    <label for="company" class="block float-left text-lg mb-2">Subject</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="subject" />
                </div>
            </div>
            <div class="input_container flex space-x-4">
                <div class="flex-1 ">
                    <label for="phone" class="block float-left text-lg mb-2">Phone</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="phone"
                        value="" />
                </div>
                <div class="flex-1">
                    <label for="price" class="block float-left text-lg mb-2">Price</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price" />
                </div>
            </div>


            {{-- <div class="mb-6">
                <div class="rounded-lg bg-gray-200 p-4">
                    <img src="{{ asset('storage/' . $item->img) }}" class="h-40" alt="">
                </div>

                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
            </div> --}}
            <div class="mb-6">
                <label for="details" class="inline-block text-lg mb-2">Details</label>
                <textarea id="description" class="border border-gray-200 rounded p-2 w-full" name="details"></textarea>
            </div>
            <div class="mb-6">

            </div>
            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Add
                </button>

                <a href="/dashboard" class="text-black ml-4"> Back </a>
            </div>
        </form>

    </div>
    {{-- cke editor snipppet --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-layout>
