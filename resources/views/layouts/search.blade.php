   <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form action="{{ route('property_search') }}" method="post">
                    {{ csrf_field() }}

                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input name="cost"type="text" class="form-control border-0 py-3"
                                        autocomplete="off"placeholder="تكلفة الايجار">
                                </div>
                                <div class="col-md-4">
                                    <select name="type" class="form-select border-0 py-3">
                                        <option placeholder="" value="">حدد النوع</option>
                                        <option value="محل تجاري">محل تجاري</option>
                                        <option value="ملحق">ملحق</option>
                                        <option value="شقة صغيرة">شقة صغيرة</option>
                                        <option value="شقة ثنائية الدور">شقة ثنائية الدور</option>
                                        <option value="شقة">شقة</option>
                                        <option value="فيلا">فيلا</option>

                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <select name="location" class="form-select border-0 py-3">
                                        <option placeholder="" value="">حدد المنطقة</option>
                                        @foreach ($quarters as $quarter)
                                            <option value="{{ $quarter->name }}">{{ $quarter->name }}</option>
                                        @endforeach



                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 py-3">بحث</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Search End -->
