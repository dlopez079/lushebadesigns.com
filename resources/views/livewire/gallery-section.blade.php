<script src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.js"></script>

<style>
    /* Chrome, Safari and Opera */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none; // IE and Edge
        scrollbar-width: none; // Firefox
    }
</style>

<section id="gallery" class="bg-indigo-500">

    <div x-data="{
            skip: 1,
            atBeginning: false,
            atEnd: false,
            next() {
                this.to((current, offset) => current + (offset * this.skip))
            },
            prev() {
                this.to((current, offset) => current - (offset * this.skip))
            },
            to(strategy) {
                let slider = this.$refs.slider
                let current = slider.scrollLeft
                let offset = slider.firstElementChild.getBoundingClientRect().width
                slider.scrollTo({ left: strategy(current, offset), behavior: 'smooth' })
            },
            focusableWhenVisible: {
                'x-intersect:enter'() {
                    this.$el.removeAttribute('tabindex')
                },
                'x-intersect:leave'() {
                    this.$el.setAttribute('tabindex', '-1')
                },
            },
            disableNextAndPreviousButtons: {
                'x-intersect:enter'() {
                    let slideEls = this.$el.parentElement.children

                    // If this is the first slide.
                    if (slideEls[0] === this.$el) {
                        this.atBeginning = true
                    // If this is the last slide.
                    } else if (slideEls[slideEls.length-1] === this.$el) {
                        this.atEnd = true
                    }
                },
                'x-intersect:leave'() {
                    let slideEls = this.$el.parentElement.children

                    // If this is the first slide.
                    if (slideEls[0] === this.$el) {
                        this.atBeginning = false
                    // If this is the last slide.
                    } else if (slideEls[slideEls.length-1] === this.$el) {
                        this.atEnd = false
                    }
                },
            },
        }" class="flex flex-col w-full">

        <div x-on:keydown.right="next" x-on:keydown.left="prev" tabindex="0" role="region"
            aria-labelledby="carousel-label" class="flex space-x-6 lg:pr-5">

            <h2 id="carousel-label" class="sr-only" hidden>Carousel</h2>

            <!-- Prev Button -->
            <button x-on:click="prev" class="text-6xl lg:hidden" :aria-disabled="atBeginning" :tabindex="atEnd ? -1 : 0"
                :class="{ 'opacity-50 cursor-not-allowed': atBeginning }">
                <span aria-hidden="true">❮</span>
                <span class="sr-only">Skip to previous slide page</span>
            </button>

            <span id="carousel-content-label" class="sr-only" hidden>Carousel</span>

            {{-- Unordered List of Images. --}}
            <ul x-ref="slider" tabindex="0" role="listbox" aria-labelledby="carousel-content-label"
                class="flex w-full overflow-x-scroll snap-x snap-mandatory no-scrollbar">

                {{-- IMAGE 1 --}}
                <li x-bind="disableNextAndPreviousButtons"
                    class="snap-start w-full lg:w-1/3 shrink-0 flex flex-col items-center justify-center p-2" role="option">
                    <img class="my-2 w-full rounded-2xl" src="{{ asset('/img/001.jpg') }}" alt="placeholder image">
                </li>

                {{-- IMAGE 2 --}}
                <li x-bind="disableNextAndPreviousButtons"
                    class="snap-start w-full lg:w-1/3 shrink-0 flex flex-col items-center justify-center p-2" role="option">
                    <img class="my-2 w-full rounded-2xl shadow-xl" src="{{ asset('/img/002.jpg') }}" alt="placeholder image">
                </li>

                {{-- IMAGE 3 --}}
                <li x-bind="disableNextAndPreviousButtons"
                    class="snap-start w-full lg:w-1/3 shrink-0 flex flex-col items-center justify-center p-2" role="option">
                    <img class="my-2 w-full rounded-2xl shadow-xl" src="{{ asset('/img/003.jpg') }}" alt="placeholder image">
                </li>

            </ul>

            <!-- Next Button -->
            <button x-on:click="next" class="text-6xl lg:hidden" :aria-disabled="atEnd" :tabindex="atEnd ? -1 : 0"
                :class="{ 'opacity-50 cursor-not-allowed': atEnd }">
                <span aria-hidden="true">❯</span>
                <span class="sr-only">Skip to next slide page</span>
            </button>
        </div>
    </div>

</section>
