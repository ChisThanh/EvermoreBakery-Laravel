@extends('layouts.main')
@section('content')
    <div class="container pb-20 pt-10">
        <div class="container">
            <div class="mb-16 space-y-2">
                <div class="container mt-5">
                <div class="text-center mb-5">
                    <h2 class="text-3xl font-medium mb-5 leading-tight">
                    Evermore Bakery Blog Posts
                    </h2>
                </div>
                <div class="flex items-center justify-center mb-8">
                    <div class="border-t border-neutral-800 flex-grow"></div>
                    <span class="px-3 text-lg font-semibold text-neutral-800 uppercase">Have a Blog</span>
                    <div class="border-t border-neutral-800 flex-grow"></div>
                </div>

            </div>
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_01.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">50 lời chúc Giáng sinh hay, ngắn gọn và ý nghĩa dành tặng mọi người</h3>
                            <p class="mt-5 text-neutral-500">Chỉ còn ít ngày nữa là đến Giáng sinh, thời điểm tuyệt vời để bày tỏ tình cảm với người thương. Bạn đã chuẩn bị những...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                            class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_02.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">Top 10 quà Giáng sinh ấn tượng và ý nghĩa dành tặng người thân yêu</h3>
                            <p class="mt-5 text-neutral-500">Giáng sinh không chỉ là mùa lễ hội mà còn là dịp để gửi trao yêu thương qua những món quà ý nghĩa. Một món quà...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_03.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">Gợi ý 10 phần quà tặng 20/10 giúp ngày Phụ nữ Việt Nam thêm phần ý nghĩa</h3>
                            <p class="mt-5 text-neutral-500">Ngày Phụ nữ Việt Nam 20/10 không chỉ là dịp để tôn vinh những đóng góp của phái đẹp trong cuộc sống mà còn là cơ hội...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_04.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">Gợi ý 101 lời chúc 20/11 ngắn gọn và ý nghĩa dành tặng thầy, cô thân yêu</h3>
                            <p class="mt-5 text-neutral-500">Ngày Nhà giáo Việt Nam 20/11 là dịp để tri ân những người thầy, người cô đã tận tâm dẫn dắt chúng ta trên con đường...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read
                                        More<svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_05.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">Mệt mỏi vì thứ hai quá nhiều cuộc họp? Nạp năng lượng với bánh ngàn lớp ngay!
                            </h3>
                            <p class="mt-5 text-neutral-500">Bộ sưu tập 6 loại bánh ngàn lớp thơm ngon của Evermore Bakery chính là “vị cứu tinh” giúp bạn tiếp thêm năng lượng cho cả tuần làm việc bận rộn...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_06.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">100 lời chúc 20/10 cho người yêu hay, ý nghĩa và chứa đựng tình cảm</h3>
                            <p class="mt-5 text-neutral-500">Ngày 20/10 là dịp đặc biệt để tôn vinh phái đẹp và gửi những lời chúc chân thành đến người yêu. Đây không chỉ là một...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read
                                        More<svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_07.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">Bỏ túi 99+ Lời Chúc Sinh Nhật Thú Vị, Ý Nghĩa Dành Tặng Mọi Người</h3>
                            <p class="mt-5 text-neutral-500">Sinh nhật là một ngày đặc biệt quan trọng đối với tất cả mọi người. Trong ngày này, chúng ta luôn mong muốn nhận được những...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_08.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">Tham Khảo 10 Món Quà Tặng Ngày 20/10 Cho Cô Giáo Ấn Tượng và Ý Nghĩa</h3>
                            <p class="mt-5 text-neutral-500">Ngày Phụ nữ Việt Nam 20/10 là dịp để bày tỏ lòng biết ơn và tôn vinh cô giáo – người dìu dắt học trò trên...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read
                                        More<svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_09.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">Gợi Ý 20 Món Quà Sinh Nhật Ấn Tượng và Thiết Thực Dành Cho Nữ Giới</h3>
                            <p class="mt-5 text-neutral-500">Chọn quà sinh nhật cho nữ không chỉ đơn thuần là một hành động tinh tế, mà còn là cách thể hiện tình cảm và sự...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_10.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">Những Lời Chúc Sinh Nhật Ý Nghĩa, Tự Tâm và Đặc Biệt Dành Cho Bản Thân</h3>
                            <p class="mt-5 text-neutral-500">Gửi lời chúc sinh nhật cho bản thân là cách thể hiện sự yêu thương và trân trọng chính mình. Đây cũng là lúc để nhìn...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read
                                        More<svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_11.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">Khám Phá 20 Món Quà Sinh Nhật Ấn Tượng và Ý Nghĩa Dành Cho Nam</h3>
                            <p class="mt-5 text-neutral-500">Sinh nhật luôn là dịp đặc biệt để bạn thể hiện tình cảm và sự quan tâm đến người thân, bạn bè, đặc biệt là phái...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read
                                        More<svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="#">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="../images/blog_12.jpg"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <h3 class="card-title text-2xl font-semibold">Tổng Hợp Những Lời Chúc Mừng Sinh Nhật Ý Nghĩa Dành Tặng Khách Hàng và Đối Tác</h3>
                            <p class="mt-5 text-neutral-500">Chắc hẳn với những ai làm công việc kinh doanh hay vận hành các doanh nghiệp, công ty,… việc phải tiếp đón và chăm sóc các...</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="#">Read
                                        More<svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
@endsection
