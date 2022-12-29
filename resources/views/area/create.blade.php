@section('title', 'Create Area')
@extends('layout.master')
@section('content')
    <div class="container py-5">
        <h3>Create Area</h3>
        <form action="{{ url('area') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-column my-2">
                <div class="d-flex flex-row">
                    <h5 class="my-2">Name<h3 class="text-danger">*<h3>
                    </h5>
                </div>

                <div class="input-group input-group-sm mb-3">
                    <input type="text" name="area_name" class="form-control" aria-label="Default"
                        aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="d-flex flex-column my-2">
                <div class="d-flex flex-row">
                    <h5 class="my-2">Address<h3 class="text-danger">*<h3>
                    </h5>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" name="area_address" class="form-control" aria-label="Default"
                        aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="d-flex flex-column my-2">
                <div class="d-flex flex-row">
                    <h5 class="my-2">Description<h3 class="text-danger">*<h3>
                    </h5>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <textarea class="form-control" name="area_description" aria-label="Default"
                        aria-describedby="inputGroup-sizing-default"></textarea>
                </div>
            </div>
            <div class="d-flex flex-column my-2 ">
                <div class="d-flex flex-row w-100">
                    <div class="d-flex flex-column w-50">
                        <div class="d-flex flex-row">
                            <h5 class="my-2">Open Hour<h3 class="text-danger">*<h3>
                            </h5>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <select name="area_open_hour" class="form-select mb-3" aria-label="Default select example">
                                <option value="00">00:00</option>
                                <option value="01">01:00</option>
                                <option value="02">02:00</option>
                                <option value="03">03:00</option>
                                <option value="04">04:00</option>
                                <option value="05">05:00</option>
                                <option value="06">06:00</option>
                                <option value="07">07:00</option>
                                <option value="08">08:00</option>
                                <option value="09">09:00</option>
                                <option value="10">10:00</option>
                                <option value="11">11:00</option>
                                <option value="12">12:00</option>
                                <option value="13">13:00</option>
                                <option value="14">14:00</option>
                                <option value="15">15:00</option>
                                <option value="16">16:00</option>
                                <option value="18">18:00</option>
                                <option value="19">19:00</option>
                                <option value="20">20:00</option>
                                <option value="21">21:00</option>
                                <option value="22">22:00</option>
                                <option value="23">23:00</option>
                            </select>

                        </div>
                    </div>
                    <div class="d-flex flex-column w-50">
                        <div class="d-flex flex-row">
                            <h5 class="my-2">Close Hour<h3 class="text-danger">*<h3>
                            </h5>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <select name="area_close_hour" class="form-select mb-3" aria-label="Default select example">
                                <option value="00">00:00</option>
                                <option value="01">01:00</option>
                                <option value="02">02:00</option>
                                <option value="03">03:00</option>
                                <option value="04">04:00</option>
                                <option value="05">05:00</option>
                                <option value="06">06:00</option>
                                <option value="07">07:00</option>
                                <option value="08">08:00</option>
                                <option value="09">09:00</option>
                                <option value="10">10:00</option>
                                <option value="11">11:00</option>
                                <option value="12">12:00</option>
                                <option value="13">13:00</option>
                                <option value="14">14:00</option>
                                <option value="15">15:00</option>
                                <option value="16">16:00</option>
                                <option value="18">18:00</option>
                                <option value="19">19:00</option>
                                <option value="20">20:00</option>
                                <option value="21">21:00</option>
                                <option value="22">22:00</option>
                                <option value="23">23:00</option>
                            </select>

                        </div>
                    </div>
                </div>

            </div>
            <div class="d-flex flex-column my-2">
                <div class="d-flex flex-row">
                    <h5 class="my-2">Price<h3 class="text-danger">*<h3>
                    </h5>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <input type="number" name="area_price" class="form-control" aria-label="Default"
                        aria-describedby="inputGroup-sizing-default">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">per hour</span>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column my-2">
                <div class="d-flex flex-row">
                    <h5 class="my-2">Area Type<h3 class="text-danger">*<h3>
                    </h5>
                </div>
                <select name="area_type" class="form-select mb-3" aria-label="Default select example">
                    @foreach ($areatypes as $a)
                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex flex-column my-2">
                <div class="d-flex flex-row">
                    <h5 class="my-2">Thumbnail<h3 class="text-danger">*<h3>
                    </h5>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <input type="file" name="area_thumbnail" class="form-control mb-3" aria-label="Default"
                        aria-describedby="inputGroup-sizing-default">
                </div>
            </div>

            <div class="d-flex flex-column my-2">
                <div class="d-flex flex-row">
                    <h5 class="my-2">Additional Pictures<h3>
                    </h5>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="d-flex flex-column w-100">
                        <div id="file-forms" class="file-forms">
                            <div id="picture_file">

                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <button onclick="addFileForm()" type="button" style="width: 10%"
                                class="btn btn-primary w-20 mr-2">Add More</button>
                            <button onclick="removeFile()" type="button" style="width: 10%"
                                class="btn btn-danger w-20 mx-2">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <span class="bg-danger text-white w-100 d-flex justify-content-center">{{ $errors->first() }}</span>
            @endif
            <div class="d-flex w-100">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>
    <script>
        const addFileForm = () => {
            const parent = document.getElementById('file-forms');
            const addFile = document.getElementById('picture_file');
            const child = document.createElement('div');
            child.id = "picture_file"
            child.innerHTML = ` <input type="file" name="area_pictures[]" class="form-control mb-3" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">`;
            parent.appendChild(child);
        }
        const removeFile = () => {
            var select = document.getElementById('file-forms');
            select.removeChild(select.lastChild);
        }
    </script>
@endsection
