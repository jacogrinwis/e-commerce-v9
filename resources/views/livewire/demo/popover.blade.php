@script
    <script type="module">
        if (!("anchorName" in document.documentElement.style)) {
            import("https://unpkg.com/@oddbird/css-anchor-positioning");
        }
    </script>
@endscript

<style>
    /* Buttons Styles */

    button[popovertarget] {
        margin-block-start: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 100vw;
        background-color: red;
        color: white;
        anchor-name: --popover;
    }

    [popover] button {
        padding: 0.5rem 1rem;
        border-radius: 100vw;
        background-color: black;
        color: white;
    }


    /* Popover Styles */

    [popover] {
        /* position: absolute; */
        position-anchor: --popover;
        /* gap: 0.5rem; */
        /* inset: auto; */
        top: anchor(--popover bottom);
        right: anchor(--popover right);
        /* border: 1px solid black; */
    }

    [popover]:popover-open {
        /* display: grid; */
    }


    /* Popover Animations */

    /* [popover] {
            opacity: 0;
            transform: scaleY(0);
            transform-origin: top;

            transition: opacity, transform, overlay, display;
            transition-duration: 1s;
            transition-behavior: allow-discrete;
        }

        [popover]:popover-open {
            opacity: 1;
            transform: scaleY(1);
        }

        @starting-style {
            [popover]:popover-open {
                opacity: 0;
                transform: scaleY(0);
            }
        } */



    /* Fade and Scale (zoom effect) */
    /* [popover] {
            opacity: 0;
            transform: scale(0.7);
            transition: opacity, transform, overlay, display;
            transition-duration: 0.3s;
            transition-behavior: allow-discrete;
        }

        [popover]:popover-open {
            opacity: 1;
            transform: scale(1);
        } */



    /* Flip animation */
    /* [popover] {
            opacity: 0;
            transform: perspective(600px) rotateX(-90deg);
            transition: opacity, transform, overlay, display;
            transition-duration: 0.5s;
            transition-behavior: allow-discrete;
        }

        [popover]:popover-open {
            opacity: 1;
            transform: perspective(600px) rotateX(0deg);
        } */



    /* Slide and rotate */
    /* [popover] {
            opacity: 0;
            transform: translateX(-20px) rotate(-5deg);
            transition: opacity, transform, overlay, display;
            transition-duration: 0.4s;
            transition-behavior: allow-discrete;
        }

        [popover]:popover-open {
            opacity: 1;
            transform: translateX(0) rotate(0deg);
        } */



    /* Bounce effect */
    /* [popover] {
            opacity: 0;
            transform: scale(0.3);
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        [popover]:popover-open {
            opacity: 1;
            transform: scale(1);
        } */



    /* Swing in */
    /* [popover] {
            opacity: 0;
            transform: rotateY(-70deg);
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        [popover]:popover-open {
            opacity: 1;
            transform: rotateY(0deg);
        } */



    /* Elastic slide */
    /* [popover] {
            opacity: 0;
            transform: translateX(-300px);
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        [popover]:popover-open {
            opacity: 1;
            transform: translateX(0);
        } */



    /* 3D fold */
    /* [popover] {
            opacity: 0;
            transform-origin: top center;
            transform: perspective(1000px) rotateX(-60deg);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        [popover]:popover-open {
            opacity: 1;
            transform: perspective(1000px) rotateX(0);
        } */



    /* Spiral */
    /* [popover] {
            opacity: 0;
            transform: rotate(720deg) scale(0);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        [popover]:popover-open {
            opacity: 1;
            transform: rotate(0deg) scale(1);
        } */



    /* Scale with fade */
    /* [popover] {
            opacity: 0;
            transform: scale(0.6);
            transition: opacity, transform, overlay, display;
            transition-duration: 0.3s;
            transition-behavior: allow-discrete;
        }

        [popover]:popover-open {
            opacity: 1;
            transform: scale(1);
        }

        @starting-style {
            [popover]:popover-open {
                opacity: 0;
                transform: scale(0.6);
            }
        } */


    /* Slide from top */
    /* [popover] {
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity, transform, overlay, display;
            transition-duration: 0.3s;
            transition-behavior: allow-discrete;
        }

        [popover]:popover-open {
            opacity: 1;
            transform: translateY(0);
        }

        @starting-style {
            [popover]:popover-open {
                opacity: 0;
                transform: translateY(-20px);
            }
        } */


    /* Combined scale and slide */
    [popover] {
        opacity: 0;
        transform: scale(0.8) translateY(-10px);
        transition: opacity, transform, overlay, display;
        transition-duration: 0.3s;
        transition-behavior: allow-discrete;
    }

    [popover]:popover-open {
        opacity: 1;
        transform: scale(1) translateY(0);
    }

    @starting-style {
        [popover]:popover-open {
            opacity: 0;
            transform: scale(0.8) translateY(-10px);
        }
    }



    /* Popover Backdrop Animations */

    [popover]::backdrop {
        transition-property: opacity display overlay;
        transition-duration: 1s;
        transition-behavior: allow-discrete;
        opacity: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }

    [popover]:popover-open::backdrop {
        opacity: 1;
    }

    @starting-style {
        [popover]:popover-open::backdrop {
            opacity: 0;
        }
    }
</style>



<div>

    <button
        class="popover-btn-open"
        popovertarget="popover"
    >
        open
    </button>


    <section
        id="popover"
        class="absolute inset-auto mt-1 grid gap-1 rounded-lg border bg-white px-4 py-2 shadow-lg dark:border-gray-600 dark:bg-gray-700"
        popover
    >
        <button
            class="popover-btn-close"
            popoveraction="hide"
            popovertarget="popover"
        >
            Close Popover
        </button>
        popover
    </section>

</div>
