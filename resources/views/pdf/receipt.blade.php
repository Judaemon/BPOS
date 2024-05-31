<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @viteReactRefresh
    @vite(['resources/js/app.jsx'])  

    <style>
        *,:before,:after {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        :before,:after {
            --tw-content: ""
        }

        html,:host {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
            font-family: Figtree,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji";
            font-feature-settings: normal;
            font-variation-settings: normal;
            -webkit-tap-highlight-color: transparent
        }

        body {
            margin: 0;
            line-height: inherit
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1,h2,h3,h4,h5,h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b,strong {
            font-weight: bolder
        }

        code,kbd,samp,pre {
            font-family: ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;
            font-feature-settings: normal;
            font-variation-settings: normal;
            font-size: 1em
        }

        small {
            font-size: 80%
        }

        sub,sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse
        }

        button,input,optgroup,select,textarea {
            font-family: inherit;
            font-feature-settings: inherit;
            font-variation-settings: inherit;
            font-size: 100%;
            font-weight: inherit;
            line-height: inherit;
            letter-spacing: inherit;
            color: inherit;
            margin: 0;
            padding: 0
        }

        button,select {
            text-transform: none
        }

        button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]) {
            -webkit-appearance: button;
            background-color: transparent;
            background-image: none
        }

        :-moz-focusring {
            outline: auto
        }

        :-moz-ui-invalid {
            box-shadow: none
        }

        progress {
            vertical-align: baseline
        }

        ::-webkit-inner-spin-button,::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        blockquote,dl,dd,h1,h2,h3,h4,h5,h6,hr,figure,p,pre {
            margin: 0
        }

        fieldset {
            margin: 0;
            padding: 0
        }

        legend {
            padding: 0
        }

        ol,ul,menu {
            list-style: none;
            margin: 0;
            padding: 0
        }

        dialog {
            padding: 0
        }

        textarea {
            resize: vertical
        }

        input::-moz-placeholder,textarea::-moz-placeholder {
            opacity: 1;
            color: #9ca3af
        }

        input::placeholder,textarea::placeholder {
            opacity: 1;
            color: #9ca3af
        }

        button,[role=button] {
            cursor: pointer
        }

        :disabled {
            cursor: default
        }

        img,svg,video,canvas,audio,iframe,embed,object {
            display: block;
            vertical-align: middle
        }

        img,video {
            max-width: 100%;
            height: auto
        }

        [hidden] {
            display: none
        }

        [type=text],input:where(:not([type])),[type=email],[type=url],[type=password],[type=number],[type=date],[type=datetime-local],[type=month],[type=search],[type=tel],[type=time],[type=week],[multiple],textarea,select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #fff;
            border-color: #6b7280;
            border-width: 1px;
            border-radius: 0;
            padding: .5rem .75rem;
            font-size: 1rem;
            line-height: 1.5rem;
            --tw-shadow: 0 0 #0000
        }

        [type=text]:focus,input:where(:not([type])):focus,[type=email]:focus,[type=url]:focus,[type=password]:focus,[type=number]:focus,[type=date]:focus,[type=datetime-local]:focus,[type=month]:focus,[type=search]:focus,[type=tel]:focus,[type=time]:focus,[type=week]:focus,[multiple]:focus,textarea:focus,select:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-inset: var(--tw-empty, );
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: #2563eb;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow);
            border-color: #2563eb
        }

        input::-moz-placeholder,textarea::-moz-placeholder {
            color: #6b7280;
            opacity: 1
        }

        input::placeholder,textarea::placeholder {
            color: #6b7280;
            opacity: 1
        }

        ::-webkit-datetime-edit-fields-wrapper {
            padding: 0
        }

        ::-webkit-date-and-time-value {
            min-height: 1.5em;
            text-align: inherit
        }

        ::-webkit-datetime-edit {
            display: inline-flex
        }

        ::-webkit-datetime-edit,::-webkit-datetime-edit-year-field,::-webkit-datetime-edit-month-field,::-webkit-datetime-edit-day-field,::-webkit-datetime-edit-hour-field,::-webkit-datetime-edit-minute-field,::-webkit-datetime-edit-second-field,::-webkit-datetime-edit-millisecond-field,::-webkit-datetime-edit-meridiem-field {
            padding-top: 0;
            padding-bottom: 0
        }

        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right .5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact
        }

        [multiple],[size]:where(select:not([size="1"])) {
            background-image: initial;
            background-position: initial;
            background-repeat: unset;
            background-size: initial;
            padding-right: .75rem;
            -webkit-print-color-adjust: unset;
            print-color-adjust: unset
        }

        [type=checkbox],[type=radio] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 0;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            flex-shrink: 0;
            height: 1rem;
            width: 1rem;
            color: #2563eb;
            background-color: #fff;
            border-color: #6b7280;
            border-width: 1px;
            --tw-shadow: 0 0 #0000
        }

        [type=checkbox] {
            border-radius: 0
        }

        [type=radio] {
            border-radius: 100%
        }

        [type=checkbox]:focus,[type=radio]:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-inset: var(--tw-empty, );
            --tw-ring-offset-width: 2px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: #2563eb;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)
        }

        [type=checkbox]:checked,[type=radio]:checked {
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat
        }

        [type=checkbox]:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e")
        }

        @media (forced-colors: active) {
            [type=checkbox]:checked {
                -webkit-appearance: auto;
                -moz-appearance: auto;
                appearance: auto
            }
        }

        [type=radio]:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e")
        }

        @media (forced-colors: active) {
            [type=radio]:checked {
                -webkit-appearance: auto;
                -moz-appearance: auto;
                appearance: auto
            }
        }

        [type=checkbox]:checked:hover,[type=checkbox]:checked:focus,[type=radio]:checked:hover,[type=radio]:checked:focus {
            border-color: transparent;
            background-color: currentColor
        }

        [type=checkbox]:indeterminate {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat
        }

        @media (forced-colors: active) {
            [type=checkbox]:indeterminate {
                -webkit-appearance: auto;
                -moz-appearance: auto;
                appearance: auto
            }
        }

        [type=checkbox]:indeterminate:hover,[type=checkbox]:indeterminate:focus {
            border-color: transparent;
            background-color: currentColor
        }

        [type=file] {
            background: unset;
            border-color: inherit;
            border-width: 0;
            border-radius: 0;
            padding: 0;
            font-size: unset;
            line-height: inherit
        }

        [type=file]:focus {
            outline: 1px solid ButtonText;
            outline: 1px auto -webkit-focus-ring-color
        }

        :root {
            --background: 0 0% 100%;
            --foreground: 240 10% 3.9%;
            --card: 0 0% 100%;
            --card-foreground: 240 10% 3.9%;
            --popover: 0 0% 100%;
            --popover-foreground: 240 10% 3.9%;
            --primary: 240 5.9% 10%;
            --primary-foreground: 0 0% 98%;
            --secondary: 240 4.8% 95.9%;
            --secondary-foreground: 240 5.9% 10%;
            --muted: 240 4.8% 95.9%;
            --muted-foreground: 240 3.8% 46.1%;
            --accent: 240 4.8% 95.9%;
            --accent-foreground: 240 5.9% 10%;
            --destructive: 0 84.2% 60.2%;
            --destructive-foreground: 0 0% 98%;
            --border: 240 5.9% 90%;
            --input: 240 5.9% 90%;
            --ring: 240 5.9% 10%;
            --radius: .5rem
        }

        .dark {
            --background: 240 10% 3.9%;
            --foreground: 0 0% 98%;
            --card: 240 10% 3.9%;
            --card-foreground: 0 0% 98%;
            --popover: 240 10% 3.9%;
            --popover-foreground: 0 0% 98%;
            --primary: 0 0% 98%;
            --primary-foreground: 240 5.9% 10%;
            --secondary: 240 3.7% 15.9%;
            --secondary-foreground: 0 0% 98%;
            --muted: 240 3.7% 15.9%;
            --muted-foreground: 240 5% 64.9%;
            --accent: 240 3.7% 15.9%;
            --accent-foreground: 0 0% 98%;
            --destructive: 0 62.8% 30.6%;
            --destructive-foreground: 0 0% 98%;
            --border: 240 3.7% 15.9%;
            --input: 240 3.7% 15.9%;
            --ring: 240 4.9% 83.9%
        }

        *,:before,:after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position: ;
            --tw-gradient-via-position: ;
            --tw-gradient-to-position: ;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / .5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
            --tw-contain-size: ;
            --tw-contain-layout: ;
            --tw-contain-paint: ;
            --tw-contain-style:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position: ;
            --tw-gradient-via-position: ;
            --tw-gradient-to-position: ;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / .5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
            --tw-contain-size: ;
            --tw-contain-layout: ;
            --tw-contain-paint: ;
            --tw-contain-style:
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0,0,0,0);
            white-space: nowrap;
            border-width: 0
        }

        .pointer-events-auto {
            pointer-events: auto
        }

        .fixed {
            position: fixed
        }

        .absolute {
            position: absolute
        }

        .relative {
            position: relative
        }

        .inset-0 {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0
        }

        .inset-x-0 {
            left: 0;
            right: 0
        }

        .-bottom-16 {
            bottom: -4rem
        }

        .-left-16 {
            left: -4rem
        }

        .-left-20 {
            left: -5rem
        }

        .bottom-0 {
            bottom: 0
        }

        .end-0 {
            inset-inline-end: 0px
        }

        .left-2 {
            left: .5rem
        }

        .left-\[50\%\] {
            left: 50%
        }

        .right-0 {
            right: 0
        }

        .right-1 {
            right: .25rem
        }

        .right-2 {
            right: .5rem
        }

        .right-4 {
            right: 1rem
        }

        .start-0 {
            inset-inline-start: 0px
        }

        .top-0 {
            top: 0
        }

        .top-1 {
            top: .25rem
        }

        .top-4 {
            top: 1rem
        }

        .top-\[50\%\] {
            top: 50%
        }

        .z-0 {
            z-index: 0
        }

        .z-40 {
            z-index: 40
        }

        .z-50 {
            z-index: 50
        }

        .z-\[100\] {
            z-index: 100
        }

        .\!row-span-1 {
            grid-row: span 1 / span 1!important
        }

        .m-1 {
            margin: .25rem
        }

        .-mx-1 {
            margin-left: -.25rem;
            margin-right: -.25rem
        }

        .-mx-3 {
            margin-left: -.75rem;
            margin-right: -.75rem
        }

        .mx-2 {
            margin-left: .5rem;
            margin-right: .5rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .my-1 {
            margin-top: .25rem;
            margin-bottom: .25rem
        }

        .my-2 {
            margin-top: .5rem;
            margin-bottom: .5rem
        }

        .-me-0 {
            margin-inline-end:-0px}

        .-me-0\.5 {
            margin-inline-end:-.125rem}

        .-me-2 {
            margin-inline-end:-.5rem}

        .-ml-3 {
            margin-left: -.75rem
        }

        .-ml-px {
            margin-left: -1px
        }

        .-mt-px {
            margin-top: -1px
        }

        .mb-2 {
            margin-bottom: .5rem
        }

        .mb-4 {
            margin-bottom: 1rem
        }

        .mb-6 {
            margin-bottom: 1.5rem
        }

        .mb-8 {
            margin-bottom: 2rem
        }

        .ml-1 {
            margin-left: .25rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .ml-3 {
            margin-left: .75rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .ml-auto {
            margin-left: auto
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ms-2 {
            margin-inline-start:.5rem}

        .ms-3 {
            margin-inline-start:.75rem}

        .ms-4 {
            margin-inline-start:1rem}

        .mt-0 {
            margin-top: 0
        }

        .mt-1 {
            margin-top: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mt-24 {
            margin-top: 6rem
        }

        .mt-3 {
            margin-top: .75rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .mt-6 {
            margin-top: 1.5rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .mt-auto {
            margin-top: auto
        }

        .block {
            display: block
        }

        .flex {
            display: flex
        }

        .inline-flex {
            display: inline-flex
        }

        .\!table {
            display: table!important
        }

        .table {
            display: table
        }

        .grid {
            display: grid
        }

        .\!hidden {
            display: none!important
        }

        .hidden {
            display: none
        }

        .aspect-video {
            aspect-ratio: 16 / 9
        }

        .size-12 {
            width: 3rem;
            height: 3rem
        }

        .size-5 {
            width: 1.25rem;
            height: 1.25rem
        }

        .size-6 {
            width: 1.5rem;
            height: 1.5rem
        }

        .h-10 {
            height: 2.5rem
        }

        .h-12 {
            height: 3rem
        }

        .h-16 {
            height: 4rem
        }

        .h-2 {
            height: .5rem
        }

        .h-20 {
            height: 5rem
        }

        .h-24 {
            height: 6rem
        }

        .h-3 {
            height: .75rem
        }

        .h-3\.5 {
            height: .875rem
        }

        .h-4 {
            height: 1rem
        }

        .h-40 {
            height: 10rem
        }

        .h-5 {
            height: 1.25rem
        }

        .h-6 {
            height: 1.5rem
        }

        .h-8 {
            height: 2rem
        }

        .h-9 {
            height: 2.25rem
        }

        .h-\[1px\] {
            height: 1px
        }

        .h-\[var\(--radix-select-trigger-height\)\] {
            height: var(--radix-select-trigger-height)
        }

        .h-auto {
            height: auto
        }

        .h-full {
            height: 100%
        }

        .h-px {
            height: 1px
        }

        .max-h-96 {
            max-height: 24rem
        }

        .max-h-\[300px\] {
            max-height: 300px
        }

        .max-h-\[calc\(100vh-2rem\)\] {
            max-height: calc(100vh - 2rem)
        }

        .max-h-screen {
            max-height: 100vh
        }

        .min-h-screen {
            min-height: 100vh
        }

        .w-20 {
            width: 5rem
        }

        .w-3 {
            width: .75rem
        }

        .w-3\.5 {
            width: .875rem
        }

        .w-3\/4 {
            width: 75%
        }

        .w-4 {
            width: 1rem
        }

        .w-48 {
            width: 12rem
        }

        .w-5 {
            width: 1.25rem
        }

        .w-5\/12 {
            width: 41.666667%
        }

        .w-6 {
            width: 1.5rem
        }

        .w-7\/12 {
            width: 58.333333%
        }

        .w-72 {
            width: 18rem
        }

        .w-8 {
            width: 2rem
        }

        .w-9 {
            width: 2.25rem
        }

        .w-\[100px\] {
            width: 100px
        }

        .w-\[150px\] {
            width: 150px
        }

        .w-\[1px\] {
            width: 1px
        }

        .w-\[200px\] {
            width: 200px
        }

        .w-\[70px\] {
            width: 70px
        }

        .w-\[calc\(100\%\+8rem\)\] {
            width: calc(100% + 8rem)
        }

        .w-auto {
            width: auto
        }

        .w-full {
            width: 100%
        }

        .min-w-\[8rem\] {
            min-width: 8rem
        }

        .min-w-\[var\(--radix-select-trigger-width\)\] {
            min-width: var(--radix-select-trigger-width)
        }

        .max-w-2xl {
            max-width: 42rem
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .max-w-7xl {
            max-width: 80rem
        }

        .max-w-\[877px\] {
            max-width: 877px
        }

        .max-w-lg {
            max-width: 32rem
        }

        .max-w-xl {
            max-width: 36rem
        }

        .flex-1 {
            flex: 1 1 0%
        }

        .shrink-0 {
            flex-shrink: 0
        }

        .caption-bottom {
            caption-side: bottom
        }

        .origin-top {
            transform-origin: top
        }

        .translate-x-\[-50\%\] {
            --tw-translate-x: -50%;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .translate-y-0 {
            --tw-translate-y: 0px;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .translate-y-4 {
            --tw-translate-y: 1rem;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .translate-y-\[-50\%\] {
            --tw-translate-y: -50%;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .scale-100 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .scale-95 {
            --tw-scale-x: .95;
            --tw-scale-y: .95;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .transform {
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .cursor-default {
            cursor: default
        }

        .select-none {
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1,minmax(0,1fr))
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2,minmax(0,1fr))
        }

        .\!flex-row {
            flex-direction: row!important
        }

        .flex-col {
            flex-direction: column
        }

        .flex-col-reverse {
            flex-direction: column-reverse
        }

        .items-start {
            align-items: flex-start
        }

        .items-center {
            align-items: center
        }

        .items-stretch {
            align-items: stretch
        }

        .justify-end {
            justify-content: flex-end
        }

        .justify-center {
            justify-content: center
        }

        .justify-between {
            justify-content: space-between
        }

        .justify-items-center {
            justify-items: center
        }

        .gap-1 {
            gap: .25rem
        }

        .gap-1\.5 {
            gap: .375rem
        }

        .gap-2 {
            gap: .5rem
        }

        .gap-4 {
            gap: 1rem
        }

        .gap-6 {
            gap: 1.5rem
        }

        .space-x-1>:not([hidden])~:not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(.25rem * var(--tw-space-x-reverse));
            margin-left: calc(.25rem * calc(1 - var(--tw-space-x-reverse)))
        }

        .space-x-12>:not([hidden])~:not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(3rem * var(--tw-space-x-reverse));
            margin-left: calc(3rem * calc(1 - var(--tw-space-x-reverse)))
        }

        .space-x-2>:not([hidden])~:not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(.5rem * var(--tw-space-x-reverse));
            margin-left: calc(.5rem * calc(1 - var(--tw-space-x-reverse)))
        }

        .space-x-4>:not([hidden])~:not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(1rem * var(--tw-space-x-reverse));
            margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)))
        }

        .space-x-6>:not([hidden])~:not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(1.5rem * var(--tw-space-x-reverse));
            margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)))
        }

        .space-x-8>:not([hidden])~:not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(2rem * var(--tw-space-x-reverse));
            margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)))
        }

        .space-y-1>:not([hidden])~:not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(.25rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(.25rem * var(--tw-space-y-reverse))
        }

        .space-y-1\.5>:not([hidden])~:not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(.375rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(.375rem * var(--tw-space-y-reverse))
        }

        .space-y-2>:not([hidden])~:not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(.5rem * var(--tw-space-y-reverse))
        }

        .space-y-4>:not([hidden])~:not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1rem * var(--tw-space-y-reverse))
        }

        .space-y-6>:not([hidden])~:not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1.5rem * var(--tw-space-y-reverse))
        }

        .self-center {
            align-self: center
        }

        .overflow-auto {
            overflow: auto
        }

        .overflow-hidden {
            overflow: hidden
        }

        .overflow-y-auto {
            overflow-y: auto
        }

        .overflow-x-hidden {
            overflow-x: hidden
        }

        .overflow-y-scroll {
            overflow-y: scroll
        }

        .whitespace-nowrap {
            white-space: nowrap
        }

        .rounded {
            border-radius: .25rem
        }

        .rounded-\[10px\] {
            border-radius: 10px
        }

        .rounded-full {
            border-radius: 9999px
        }

        .rounded-lg {
            border-radius: var(--radius)
        }

        .rounded-md {
            border-radius: calc(var(--radius) - 2px)
        }

        .rounded-sm {
            border-radius: calc(var(--radius) - 4px)
        }

        .rounded-l-md {
            border-top-left-radius: calc(var(--radius) - 2px);
            border-bottom-left-radius: calc(var(--radius) - 2px)
        }

        .rounded-r-md {
            border-top-right-radius: calc(var(--radius) - 2px);
            border-bottom-right-radius: calc(var(--radius) - 2px)
        }

        .rounded-t-\[10px\] {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px
        }

        .border {
            border-width: 1px
        }

        .border-b {
            border-bottom-width: 1px
        }

        .border-b-2 {
            border-bottom-width: 2px
        }

        .border-l-4 {
            border-left-width: 4px
        }

        .border-r {
            border-right-width: 1px
        }

        .border-t {
            border-top-width: 1px
        }

        .border-dashed {
            border-style: dashed
        }

        .border-destructive {
            border-color: hsl(var(--destructive))
        }

        .border-gray-100 {
            --tw-border-opacity: 1;
            border-color: rgb(243 244 246 / var(--tw-border-opacity))
        }

        .border-gray-200 {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity))
        }

        .border-gray-300 {
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity))
        }

        .border-gray-400 {
            --tw-border-opacity: 1;
            border-color: rgb(156 163 175 / var(--tw-border-opacity))
        }

        .border-indigo-400 {
            --tw-border-opacity: 1;
            border-color: rgb(129 140 248 / var(--tw-border-opacity))
        }

        .border-input {
            border-color: hsl(var(--input))
        }

        .border-primary {
            border-color: hsl(var(--primary))
        }

        .border-transparent {
            border-color: transparent
        }

        .bg-\[\#FF2D20\]\/10 {
            background-color: #ff2d201a
        }

        .bg-background {
            background-color: hsl(var(--background))
        }

        .bg-black\/80 {
            background-color: #000c
        }

        .bg-border {
            background-color: hsl(var(--border))
        }

        .bg-destructive {
            background-color: hsl(var(--destructive))
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .bg-gray-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity))
        }

        .bg-gray-500\/75 {
            background-color: #6b7280bf
        }

        .bg-gray-800 {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity))
        }

        .bg-indigo-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(238 242 255 / var(--tw-bg-opacity))
        }

        .bg-muted {
            background-color: hsl(var(--muted))
        }

        .bg-muted\/50 {
            background-color: hsl(var(--muted) / .5)
        }

        .bg-popover {
            background-color: hsl(var(--popover))
        }

        .bg-primary {
            background-color: hsl(var(--primary))
        }

        .bg-red-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(220 38 38 / var(--tw-bg-opacity))
        }

        .bg-red-800 {
            --tw-bg-opacity: 1;
            background-color: rgb(153 27 27 / var(--tw-bg-opacity))
        }

        .bg-secondary {
            background-color: hsl(var(--secondary))
        }

        .bg-transparent {
            background-color: transparent
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-gradient-to-b {
            background-image: linear-gradient(to bottom,var(--tw-gradient-stops))
        }

        .from-transparent {
            --tw-gradient-from: transparent var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
        }

        .via-white {
            --tw-gradient-to: rgb(255 255 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)
        }

        .to-white {
            --tw-gradient-to: #fff var(--tw-gradient-to-position)
        }

        .fill-current {
            fill: currentColor
        }

        .stroke-\[\#FF2D20\] {
            stroke: #ff2d20
        }

        .object-cover {
            -o-object-fit: cover;
            object-fit: cover
        }

        .object-top {
            -o-object-position: top;
            object-position: top
        }

        .p-0 {
            padding: 0
        }

        .p-1 {
            padding: .25rem
        }

        .p-2 {
            padding: .5rem
        }

        .p-4 {
            padding: 1rem
        }

        .p-6 {
            padding: 1.5rem
        }

        .p-8 {
            padding: 2rem
        }

        .px-1 {
            padding-left: .25rem;
            padding-right: .25rem
        }

        .px-2 {
            padding-left: .5rem;
            padding-right: .5rem
        }

        .px-2\.5 {
            padding-left: .625rem;
            padding-right: .625rem
        }

        .px-3 {
            padding-left: .75rem;
            padding-right: .75rem
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .px-8 {
            padding-left: 2rem;
            padding-right: 2rem
        }

        .py-0 {
            padding-top: 0;
            padding-bottom: 0
        }

        .py-0\.5 {
            padding-top: .125rem;
            padding-bottom: .125rem
        }

        .py-1 {
            padding-top: .25rem;
            padding-bottom: .25rem
        }

        .py-1\.5 {
            padding-top: .375rem;
            padding-bottom: .375rem
        }

        .py-10 {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem
        }

        .py-16 {
            padding-top: 4rem;
            padding-bottom: 4rem
        }

        .py-2 {
            padding-top: .5rem;
            padding-bottom: .5rem
        }

        .py-3 {
            padding-top: .75rem;
            padding-bottom: .75rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem
        }

        .pb-1 {
            padding-bottom: .25rem
        }

        .pb-3 {
            padding-bottom: .75rem
        }

        .pe-4 {
            padding-inline-end:1rem}

        .pl-1 {
            padding-left: .25rem
        }

        .pl-2 {
            padding-left: .5rem
        }

        .pl-8 {
            padding-left: 2rem
        }

        .pr-2 {
            padding-right: .5rem
        }

        .pr-6 {
            padding-right: 1.5rem
        }

        .pr-8 {
            padding-right: 2rem
        }

        .ps-3 {
            padding-inline-start:.75rem}

        .pt-1 {
            padding-top: .25rem
        }

        .pt-2 {
            padding-top: .5rem
        }

        .pt-3 {
            padding-top: .75rem
        }

        .pt-4 {
            padding-top: 1rem
        }

        .pt-6 {
            padding-top: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .text-left {
            text-align: left
        }

        .text-center {
            text-align: center
        }

        .text-right {
            text-align: right
        }

        .text-start {
            text-align: start
        }

        .align-middle {
            vertical-align: middle
        }

        .font-mono {
            font-family: ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace
        }

        .font-sans {
            font-family: Figtree,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji"
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem
        }

        .text-3xl {
            font-size: 1.875rem;
            line-height: 2.25rem
        }

        .text-\[0\.8rem\] {
            font-size: .8rem
        }

        .text-base {
            font-size: 1rem;
            line-height: 1.5rem
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem
        }

        .text-sm {
            font-size: .875rem;
            line-height: 1.25rem
        }

        .text-sm\/relaxed {
            font-size: .875rem;
            line-height: 1.625
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem
        }

        .text-xs {
            font-size: .75rem;
            line-height: 1rem
        }

        .font-bold {
            font-weight: 700
        }

        .font-medium {
            font-weight: 500
        }

        .font-normal {
            font-weight: 400
        }

        .font-semibold {
            font-weight: 600
        }

        .uppercase {
            text-transform: uppercase
        }

        .capitalize {
            text-transform: capitalize
        }

        .leading-4 {
            line-height: 1rem
        }

        .leading-5 {
            line-height: 1.25rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .leading-none {
            line-height: 1
        }

        .leading-tight {
            line-height: 1.25
        }

        .tracking-tight {
            letter-spacing: -.025em
        }

        .tracking-wider {
            letter-spacing: .05em
        }

        .tracking-widest {
            letter-spacing: .1em
        }

        .text-black {
            --tw-text-opacity: 1;
            color: rgb(0 0 0 / var(--tw-text-opacity))
        }

        .text-black\/50 {
            color: #00000080
        }

        .text-current {
            color: currentColor
        }

        .text-destructive {
            color: hsl(var(--destructive))
        }

        .text-destructive-foreground {
            color: hsl(var(--destructive-foreground))
        }

        .text-foreground {
            color: hsl(var(--foreground))
        }

        .text-foreground\/50 {
            color: hsl(var(--foreground) / .5)
        }

        .text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .text-gray-800 {
            --tw-text-opacity: 1;
            color: rgb(31 41 55 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .text-green-600 {
            --tw-text-opacity: 1;
            color: rgb(22 163 74 / var(--tw-text-opacity))
        }

        .text-indigo-600 {
            --tw-text-opacity: 1;
            color: rgb(79 70 229 / var(--tw-text-opacity))
        }

        .text-indigo-700 {
            --tw-text-opacity: 1;
            color: rgb(67 56 202 / var(--tw-text-opacity))
        }

        .text-muted {
            color: hsl(var(--muted))
        }

        .text-muted-foreground {
            color: hsl(var(--muted-foreground))
        }

        .text-muted-foreground\/70 {
            color: hsl(var(--muted-foreground) / .7)
        }

        .text-popover-foreground {
            color: hsl(var(--popover-foreground))
        }

        .text-primary {
            color: hsl(var(--primary))
        }

        .text-primary-foreground {
            color: hsl(var(--primary-foreground))
        }

        .text-red-600 {
            --tw-text-opacity: 1;
            color: rgb(220 38 38 / var(--tw-text-opacity))
        }

        .text-secondary-foreground {
            color: hsl(var(--secondary-foreground))
        }

        .text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .underline {
            text-decoration-line: underline
        }

        .underline-offset-4 {
            text-underline-offset: 4px
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .opacity-0 {
            opacity: 0
        }

        .opacity-100 {
            opacity: 1
        }

        .opacity-25 {
            opacity: .25
        }

        .opacity-50 {
            opacity: .5
        }

        .opacity-60 {
            opacity: .6
        }

        .opacity-70 {
            opacity: .7
        }

        .opacity-90 {
            opacity: .9
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)
        }

        .shadow-\[0px_14px_34px_0px_rgba\(0\,0\,0\,0\.08\)\] {
            --tw-shadow: 0px 14px 34px 0px rgba(0,0,0,.08);
            --tw-shadow-colored: 0px 14px 34px 0px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)
        }

        .shadow-lg {
            --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / .1), 0 4px 6px -4px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)
        }

        .shadow-md {
            --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / .1), 0 2px 4px -2px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)
        }

        .shadow-sm {
            --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / .05);
            --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)
        }

        .shadow-xl {
            --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / .1), 0 8px 10px -6px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)
        }

        .outline-none {
            outline: 2px solid transparent;
            outline-offset: 2px
        }

        .outline {
            outline-style: solid
        }

        .ring-1 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)
        }

        .ring-black {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(0 0 0 / var(--tw-ring-opacity))
        }

        .ring-gray-300 {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(209 213 219 / var(--tw-ring-opacity))
        }

        .ring-transparent {
            --tw-ring-color: transparent
        }

        .ring-white\/\[0\.05\] {
            --tw-ring-color: rgb(255 255 255 / .05)
        }

        .ring-opacity-5 {
            --tw-ring-opacity: .05
        }

        .ring-offset-background {
            --tw-ring-offset-color: hsl(var(--background))
        }

        .drop-shadow-\[0px_4px_34px_rgba\(0\,0\,0\,0\.06\)\] {
            --tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0,0,0,.06));
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
        }

        .drop-shadow-\[0px_4px_34px_rgba\(0\,0\,0\,0\.25\)\] {
            --tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0,0,0,.25));
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
        }

        .filter {
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
        }

        .transition {
            transition-property: color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,-webkit-backdrop-filter;
            transition-property: color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter;
            transition-property: color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;
            transition-timing-function: cubic-bezier(.4,0,.2,1);
            transition-duration: .15s
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(.4,0,.2,1);
            transition-duration: .15s
        }

        .transition-colors {
            transition-property: color,background-color,border-color,text-decoration-color,fill,stroke;
            transition-timing-function: cubic-bezier(.4,0,.2,1);
            transition-duration: .15s
        }

        .transition-opacity {
            transition-property: opacity;
            transition-timing-function: cubic-bezier(.4,0,.2,1);
            transition-duration: .15s
        }

        .duration-150 {
            transition-duration: .15s
        }

        .duration-200 {
            transition-duration: .2s
        }

        .duration-300 {
            transition-duration: .3s
        }

        .duration-75 {
            transition-duration: 75ms
        }

        .ease-in {
            transition-timing-function: cubic-bezier(.4,0,1,1)
        }

        .ease-in-out {
            transition-timing-function: cubic-bezier(.4,0,.2,1)
        }

        .ease-out {
            transition-timing-function: cubic-bezier(0,0,.2,1)
        }

        @keyframes enter {
            0% {
                opacity: var(--tw-enter-opacity, 1);
                transform: translate3d(var(--tw-enter-translate-x, 0),var(--tw-enter-translate-y, 0),0) scale3d(var(--tw-enter-scale, 1),var(--tw-enter-scale, 1),var(--tw-enter-scale, 1)) rotate(var(--tw-enter-rotate, 0))
            }
        }

        @keyframes exit {
            to {
                opacity: var(--tw-exit-opacity, 1);
                transform: translate3d(var(--tw-exit-translate-x, 0),var(--tw-exit-translate-y, 0),0) scale3d(var(--tw-exit-scale, 1),var(--tw-exit-scale, 1),var(--tw-exit-scale, 1)) rotate(var(--tw-exit-rotate, 0))
            }
        }

        .duration-150 {
            animation-duration: .15s
        }

        .duration-200 {
            animation-duration: .2s
        }

        .duration-300 {
            animation-duration: .3s
        }

        .duration-75 {
            animation-duration: 75ms
        }

        .ease-in {
            animation-timing-function: cubic-bezier(.4,0,1,1)
        }

        .ease-in-out {
            animation-timing-function: cubic-bezier(.4,0,.2,1)
        }

        .ease-out {
            animation-timing-function: cubic-bezier(0,0,.2,1)
        }

        .\[-ms-overflow-style\:none\] {
            -ms-overflow-style: none
        }

        .\[scrollbar-width\:none\] {
            scrollbar-width: none
        }

        .selection\:bg-\[\#FF2D20\] *::-moz-selection {
            --tw-bg-opacity: 1;
            background-color: rgb(255 45 32 / var(--tw-bg-opacity))
        }

        .selection\:bg-\[\#FF2D20\] *::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(255 45 32 / var(--tw-bg-opacity))
        }

        .selection\:text-white *::-moz-selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .selection\:text-white *::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .selection\:bg-\[\#FF2D20\]::-moz-selection {
            --tw-bg-opacity: 1;
            background-color: rgb(255 45 32 / var(--tw-bg-opacity))
        }

        .selection\:bg-\[\#FF2D20\]::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(255 45 32 / var(--tw-bg-opacity))
        }

        .selection\:text-white::-moz-selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .selection\:text-white::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .file\:border-0::file-selector-button {
            border-width: 0px
        }

        .file\:bg-transparent::file-selector-button {
            background-color: transparent
        }

        .file\:text-sm::file-selector-button {
            font-size: .875rem;
            line-height: 1.25rem
        }

        .file\:font-medium::file-selector-button {
            font-weight: 500
        }

        .placeholder\:text-muted-foreground::-moz-placeholder {
            color: hsl(var(--muted-foreground))
        }

        .placeholder\:text-muted-foreground::placeholder {
            color: hsl(var(--muted-foreground))
        }

        .hover\:border-gray-300:hover {
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity))
        }

        .hover\:bg-accent:hover {
            background-color: hsl(var(--accent))
        }

        .hover\:bg-destructive\/80:hover {
            background-color: hsl(var(--destructive) / .8)
        }

        .hover\:bg-destructive\/90:hover {
            background-color: hsl(var(--destructive) / .9)
        }

        .hover\:bg-gray-100:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .hover\:bg-gray-50:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity))
        }

        .hover\:bg-gray-700:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity))
        }

        .hover\:bg-muted\/50:hover {
            background-color: hsl(var(--muted) / .5)
        }

        .hover\:bg-primary\/80:hover {
            background-color: hsl(var(--primary) / .8)
        }

        .hover\:bg-primary\/90:hover {
            background-color: hsl(var(--primary) / .9)
        }

        .hover\:bg-red-500:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .hover\:bg-secondary:hover {
            background-color: hsl(var(--secondary))
        }

        .hover\:bg-secondary\/80:hover {
            background-color: hsl(var(--secondary) / .8)
        }

        .hover\:text-accent-foreground:hover {
            color: hsl(var(--accent-foreground))
        }

        .hover\:text-black:hover {
            --tw-text-opacity: 1;
            color: rgb(0 0 0 / var(--tw-text-opacity))
        }

        .hover\:text-black\/70:hover {
            color: #000000b3
        }

        .hover\:text-foreground:hover {
            color: hsl(var(--foreground))
        }

        .hover\:text-gray-400:hover {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .hover\:text-gray-500:hover {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .hover\:text-gray-700:hover {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .hover\:text-gray-800:hover {
            --tw-text-opacity: 1;
            color: rgb(31 41 55 / var(--tw-text-opacity))
        }

        .hover\:text-gray-900:hover {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .hover\:underline:hover {
            text-decoration-line: underline
        }

        .hover\:opacity-100:hover {
            opacity: 1
        }

        .hover\:ring-black\/20:hover {
            --tw-ring-color: rgb(0 0 0 / .2)
        }

        .focus\:z-10:focus {
            z-index: 10
        }

        .focus\:border-blue-300:focus {
            --tw-border-opacity: 1;
            border-color: rgb(147 197 253 / var(--tw-border-opacity))
        }

        .focus\:border-gray-300:focus {
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity))
        }

        .focus\:border-indigo-500:focus {
            --tw-border-opacity: 1;
            border-color: rgb(99 102 241 / var(--tw-border-opacity))
        }

        .focus\:border-indigo-700:focus {
            --tw-border-opacity: 1;
            border-color: rgb(67 56 202 / var(--tw-border-opacity))
        }

        .focus\:border-transparent:focus {
            border-color: transparent
        }

        .focus\:bg-accent:focus {
            background-color: hsl(var(--accent))
        }

        .focus\:bg-gray-100:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .focus\:bg-gray-50:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity))
        }

        .focus\:bg-gray-700:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity))
        }

        .focus\:bg-indigo-100:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(224 231 255 / var(--tw-bg-opacity))
        }

        .focus\:text-accent-foreground:focus {
            color: hsl(var(--accent-foreground))
        }

        .focus\:text-gray-500:focus {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .focus\:text-gray-700:focus {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .focus\:text-gray-800:focus {
            --tw-text-opacity: 1;
            color: rgb(31 41 55 / var(--tw-text-opacity))
        }

        .focus\:text-indigo-800:focus {
            --tw-text-opacity: 1;
            color: rgb(55 48 163 / var(--tw-text-opacity))
        }

        .focus\:opacity-100:focus {
            opacity: 1
        }

        .focus\:outline-none:focus {
            outline: 2px solid transparent;
            outline-offset: 2px
        }

        .focus\:ring:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)
        }

        .focus\:ring-0:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)
        }

        .focus\:ring-1:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)
        }

        .focus\:ring-2:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)
        }

        .focus\:ring-indigo-500:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(99 102 241 / var(--tw-ring-opacity))
        }

        .focus\:ring-red-500:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(239 68 68 / var(--tw-ring-opacity))
        }

        .focus\:ring-ring:focus {
            --tw-ring-color: hsl(var(--ring))
        }

        .focus\:ring-offset-2:focus {
            --tw-ring-offset-width: 2px
        }

        .focus-visible\:outline-none:focus-visible {
            outline: 2px solid transparent;
            outline-offset: 2px
        }

        .focus-visible\:ring-1:focus-visible {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)
        }

        .focus-visible\:ring-\[\#FF2D20\]:focus-visible {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity))
        }

        .focus-visible\:ring-ring:focus-visible {
            --tw-ring-color: hsl(var(--ring))
        }

        .active\:bg-gray-100:active {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .active\:bg-gray-900:active {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity))
        }

        .active\:bg-red-700:active {
            --tw-bg-opacity: 1;
            background-color: rgb(185 28 28 / var(--tw-bg-opacity))
        }

        .active\:text-gray-500:active {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .active\:text-gray-700:active {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .disabled\:pointer-events-none:disabled {
            pointer-events: none
        }

        .disabled\:cursor-not-allowed:disabled {
            cursor: not-allowed
        }

        .disabled\:opacity-25:disabled {
            opacity: .25
        }

        .disabled\:opacity-50:disabled {
            opacity: .5
        }

        .group:hover .group-hover\:opacity-100 {
            opacity: 1
        }

        .group.destructive .group-\[\.destructive\]\:border-muted\/40 {
            border-color: hsl(var(--muted) / .4)
        }

        .group.destructive .group-\[\.destructive\]\:text-red-300 {
            --tw-text-opacity: 1;
            color: rgb(252 165 165 / var(--tw-text-opacity))
        }

        .group.destructive .group-\[\.destructive\]\:hover\:border-destructive\/30:hover {
            border-color: hsl(var(--destructive) / .3)
        }

        .group.destructive .group-\[\.destructive\]\:hover\:bg-destructive:hover {
            background-color: hsl(var(--destructive))
        }

        .group.destructive .group-\[\.destructive\]\:hover\:text-destructive-foreground:hover {
            color: hsl(var(--destructive-foreground))
        }

        .group.destructive .group-\[\.destructive\]\:hover\:text-red-50:hover {
            --tw-text-opacity: 1;
            color: rgb(254 242 242 / var(--tw-text-opacity))
        }

        .group.destructive .group-\[\.destructive\]\:focus\:ring-destructive:focus {
            --tw-ring-color: hsl(var(--destructive))
        }

        .group.destructive .group-\[\.destructive\]\:focus\:ring-red-400:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(248 113 113 / var(--tw-ring-opacity))
        }

        .group.destructive .group-\[\.destructive\]\:focus\:ring-offset-red-600:focus {
            --tw-ring-offset-color: #dc2626
        }

        .peer:disabled~.peer-disabled\:cursor-not-allowed {
            cursor: not-allowed
        }

        .peer:disabled~.peer-disabled\:opacity-70 {
            opacity: .7
        }

        .aria-selected\:bg-accent[aria-selected=true] {
            background-color: hsl(var(--accent))
        }

        .aria-selected\:text-accent-foreground[aria-selected=true] {
            color: hsl(var(--accent-foreground))
        }

        .data-\[disabled\=true\]\:pointer-events-none[data-disabled=true],.data-\[disabled\]\:pointer-events-none[data-disabled] {
            pointer-events: none
        }

        .data-\[side\=bottom\]\:translate-y-1[data-side=bottom] {
            --tw-translate-y: .25rem;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .data-\[side\=left\]\:-translate-x-1[data-side=left] {
            --tw-translate-x: -.25rem;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .data-\[side\=right\]\:translate-x-1[data-side=right] {
            --tw-translate-x: .25rem;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .data-\[side\=top\]\:-translate-y-1[data-side=top] {
            --tw-translate-y: -.25rem;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .data-\[swipe\=cancel\]\:translate-x-0[data-swipe=cancel] {
            --tw-translate-x: 0px;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .data-\[swipe\=end\]\:translate-x-\[var\(--radix-toast-swipe-end-x\)\][data-swipe=end] {
            --tw-translate-x: var(--radix-toast-swipe-end-x);
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .data-\[swipe\=move\]\:translate-x-\[var\(--radix-toast-swipe-move-x\)\][data-swipe=move] {
            --tw-translate-x: var(--radix-toast-swipe-move-x);
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .data-\[state\=checked\]\:bg-primary[data-state=checked] {
            background-color: hsl(var(--primary))
        }

        .data-\[state\=open\]\:bg-accent[data-state=open] {
            background-color: hsl(var(--accent))
        }

        .data-\[state\=selected\]\:bg-muted[data-state=selected] {
            background-color: hsl(var(--muted))
        }

        .data-\[state\=checked\]\:text-primary-foreground[data-state=checked] {
            color: hsl(var(--primary-foreground))
        }

        .data-\[state\=open\]\:text-muted-foreground[data-state=open] {
            color: hsl(var(--muted-foreground))
        }

        .data-\[disabled\=true\]\:opacity-50[data-disabled=true],.data-\[disabled\]\:opacity-50[data-disabled] {
            opacity: .5
        }

        .data-\[swipe\=move\]\:transition-none[data-swipe=move] {
            transition-property: none
        }

        .data-\[state\=open\]\:animate-in[data-state=open] {
            animation-name: enter;
            animation-duration: .15s;
            --tw-enter-opacity: initial;
            --tw-enter-scale: initial;
            --tw-enter-rotate: initial;
            --tw-enter-translate-x: initial;
            --tw-enter-translate-y: initial
        }

        .data-\[state\=closed\]\:animate-out[data-state=closed],.data-\[swipe\=end\]\:animate-out[data-swipe=end] {
            animation-name: exit;
            animation-duration: .15s;
            --tw-exit-opacity: initial;
            --tw-exit-scale: initial;
            --tw-exit-rotate: initial;
            --tw-exit-translate-x: initial;
            --tw-exit-translate-y: initial
        }

        .data-\[state\=closed\]\:fade-out-0[data-state=closed] {
            --tw-exit-opacity: 0
        }

        .data-\[state\=closed\]\:fade-out-80[data-state=closed] {
            --tw-exit-opacity: .8
        }

        .data-\[state\=open\]\:fade-in-0[data-state=open] {
            --tw-enter-opacity: 0
        }

        .data-\[state\=closed\]\:zoom-out-95[data-state=closed] {
            --tw-exit-scale: .95
        }

        .data-\[state\=open\]\:zoom-in-95[data-state=open] {
            --tw-enter-scale: .95
        }

        .data-\[side\=bottom\]\:slide-in-from-top-2[data-side=bottom] {
            --tw-enter-translate-y: -.5rem
        }

        .data-\[side\=left\]\:slide-in-from-right-2[data-side=left] {
            --tw-enter-translate-x: .5rem
        }

        .data-\[side\=right\]\:slide-in-from-left-2[data-side=right] {
            --tw-enter-translate-x: -.5rem
        }

        .data-\[side\=top\]\:slide-in-from-bottom-2[data-side=top] {
            --tw-enter-translate-y: .5rem
        }

        .data-\[state\=closed\]\:slide-out-to-left-1\/2[data-state=closed] {
            --tw-exit-translate-x: -50%
        }

        .data-\[state\=closed\]\:slide-out-to-right-full[data-state=closed] {
            --tw-exit-translate-x: 100%
        }

        .data-\[state\=closed\]\:slide-out-to-top-\[48\%\][data-state=closed] {
            --tw-exit-translate-y: -48%
        }

        .data-\[state\=open\]\:slide-in-from-left-1\/2[data-state=open] {
            --tw-enter-translate-x: -50%
        }

        .data-\[state\=open\]\:slide-in-from-top-\[48\%\][data-state=open] {
            --tw-enter-translate-y: -48%
        }

        .data-\[state\=open\]\:slide-in-from-top-full[data-state=open] {
            --tw-enter-translate-y: -100%
        }

        .dark\:block:is(.dark *) {
            display: block
        }

        .dark\:hidden:is(.dark *) {
            display: none
        }

        .dark\:border-gray-500:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(107 114 128 / var(--tw-border-opacity))
        }

        .dark\:border-gray-600:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(75 85 99 / var(--tw-border-opacity))
        }

        .dark\:border-gray-700:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(55 65 81 / var(--tw-border-opacity))
        }

        .dark\:border-indigo-600:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(79 70 229 / var(--tw-border-opacity))
        }

        .dark\:bg-black:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(0 0 0 / var(--tw-bg-opacity))
        }

        .dark\:bg-gray-200:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(229 231 235 / var(--tw-bg-opacity))
        }

        .dark\:bg-gray-700:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity))
        }

        .dark\:bg-gray-800:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity))
        }

        .dark\:bg-gray-900:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity))
        }

        .dark\:bg-gray-900\/75:is(.dark *) {
            background-color: #111827bf
        }

        .dark\:bg-indigo-900\/50:is(.dark *) {
            background-color: #312e8180
        }

        .dark\:bg-zinc-900:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(24 24 27 / var(--tw-bg-opacity))
        }

        .dark\:via-zinc-900:is(.dark *) {
            --tw-gradient-to: rgb(24 24 27 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)
        }

        .dark\:to-zinc-900:is(.dark *) {
            --tw-gradient-to: #18181b var(--tw-gradient-to-position)
        }

        .dark\:text-gray-100:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(243 244 246 / var(--tw-text-opacity))
        }

        .dark\:text-gray-200:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .dark\:text-gray-300:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .dark\:text-gray-400:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .dark\:text-gray-500:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .dark\:text-gray-600:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .dark\:text-gray-800:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(31 41 55 / var(--tw-text-opacity))
        }

        .dark\:text-green-400:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(74 222 128 / var(--tw-text-opacity))
        }

        .dark\:text-indigo-300:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(165 180 252 / var(--tw-text-opacity))
        }

        .dark\:text-red-400:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(248 113 113 / var(--tw-text-opacity))
        }

        .dark\:text-white:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .dark\:text-white\/50:is(.dark *) {
            color: #ffffff80
        }

        .dark\:text-white\/70:is(.dark *) {
            color: #ffffffb3
        }

        .dark\:ring-zinc-800:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(39 39 42 / var(--tw-ring-opacity))
        }

        .dark\:hover\:border-gray-600:hover:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(75 85 99 / var(--tw-border-opacity))
        }

        .dark\:hover\:border-gray-700:hover:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(55 65 81 / var(--tw-border-opacity))
        }

        .dark\:hover\:bg-gray-700:hover:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity))
        }

        .dark\:hover\:bg-gray-800:hover:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity))
        }

        .dark\:hover\:bg-gray-900:hover:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity))
        }

        .dark\:hover\:bg-white:hover:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .dark\:hover\:text-gray-100:hover:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(243 244 246 / var(--tw-text-opacity))
        }

        .dark\:hover\:text-gray-200:hover:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .dark\:hover\:text-gray-300:hover:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .dark\:hover\:text-gray-400:hover:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .dark\:hover\:text-white:hover:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .dark\:hover\:text-white\/70:hover:is(.dark *) {
            color: #ffffffb3
        }

        .dark\:hover\:text-white\/80:hover:is(.dark *) {
            color: #fffc
        }

        .dark\:hover\:ring-zinc-700:hover:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(63 63 70 / var(--tw-ring-opacity))
        }

        .dark\:focus\:border-blue-700:focus:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(29 78 216 / var(--tw-border-opacity))
        }

        .dark\:focus\:border-blue-800:focus:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(30 64 175 / var(--tw-border-opacity))
        }

        .dark\:focus\:border-gray-600:focus:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(75 85 99 / var(--tw-border-opacity))
        }

        .dark\:focus\:border-gray-700:focus:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(55 65 81 / var(--tw-border-opacity))
        }

        .dark\:focus\:border-indigo-300:focus:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(165 180 252 / var(--tw-border-opacity))
        }

        .dark\:focus\:border-indigo-600:focus:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(79 70 229 / var(--tw-border-opacity))
        }

        .dark\:focus\:bg-gray-700:focus:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity))
        }

        .dark\:focus\:bg-gray-800:focus:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity))
        }

        .dark\:focus\:bg-gray-900:focus:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity))
        }

        .dark\:focus\:bg-indigo-900:focus:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(49 46 129 / var(--tw-bg-opacity))
        }

        .dark\:focus\:bg-white:focus:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .dark\:focus\:text-gray-200:focus:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .dark\:focus\:text-gray-300:focus:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .dark\:focus\:text-gray-400:focus:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .dark\:focus\:text-indigo-200:focus:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(199 210 254 / var(--tw-text-opacity))
        }

        .dark\:focus\:ring-indigo-600:focus:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(79 70 229 / var(--tw-ring-opacity))
        }

        .dark\:focus\:ring-offset-gray-800:focus:is(.dark *) {
            --tw-ring-offset-color: #1f2937
        }

        .dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity))
        }

        .dark\:focus-visible\:ring-white:focus-visible:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity))
        }

        .dark\:active\:bg-gray-300:active:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(209 213 219 / var(--tw-bg-opacity))
        }

        .dark\:active\:bg-gray-700:active:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity))
        }

        .dark\:active\:text-gray-300:active:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        @media (min-width: 640px) {
            .sm\:bottom-0 {
                bottom:0
            }

            .sm\:right-0 {
                right: 0
            }

            .sm\:top-auto {
                top: auto
            }

            .sm\:-my-px {
                margin-top: -1px;
                margin-bottom: -1px
            }

            .sm\:mx-auto {
                margin-left: auto;
                margin-right: auto
            }

            .sm\:ms-10 {
                margin-inline-start:2.5rem}

            .sm\:ms-6 {
                margin-inline-start:1.5rem}

            .sm\:flex {
                display: flex
            }

            .sm\:hidden {
                display: none
            }

            .sm\:size-16 {
                width: 4rem;
                height: 4rem
            }

            .sm\:size-6 {
                width: 1.5rem;
                height: 1.5rem
            }

            .sm\:w-full {
                width: 100%
            }

            .sm\:max-w-2xl {
                max-width: 42rem
            }

            .sm\:max-w-\[425px\] {
                max-width: 425px
            }

            .sm\:max-w-lg {
                max-width: 32rem
            }

            .sm\:max-w-md {
                max-width: 28rem
            }

            .sm\:max-w-sm {
                max-width: 24rem
            }

            .sm\:max-w-xl {
                max-width: 36rem
            }

            .sm\:flex-1 {
                flex: 1 1 0%
            }

            .sm\:translate-y-0 {
                --tw-translate-y: 0px;
                transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }

            .sm\:scale-100 {
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }

            .sm\:scale-95 {
                --tw-scale-x: .95;
                --tw-scale-y: .95;
                transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }

            .sm\:flex-row {
                flex-direction: row
            }

            .sm\:flex-col {
                flex-direction: column
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-end {
                justify-content: flex-end
            }

            .sm\:justify-center {
                justify-content: center
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:space-x-2>:not([hidden])~:not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(.5rem * var(--tw-space-x-reverse));
                margin-left: calc(.5rem * calc(1 - var(--tw-space-x-reverse)))
            }

            .sm\:rounded-lg {
                border-radius: var(--radius)
            }

            .sm\:p-8 {
                padding: 2rem
            }

            .sm\:px-0 {
                padding-left: 0;
                padding-right: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:pt-5 {
                padding-top: 1.25rem
            }

            .sm\:text-left {
                text-align: left
            }

            .data-\[state\=open\]\:sm\:slide-in-from-bottom-full[data-state=open] {
                --tw-enter-translate-y: 100%
            }
        }

        @media (min-width: 768px) {
            .md\:row-span-3 {
                grid-row:span 3 / span 3
            }

            .md\:max-w-\[420px\] {
                max-width: 420px
            }
        }

        @media (min-width: 1024px) {
            .lg\:col-start-2 {
                grid-column-start:2
            }

            .lg\:flex {
                display: flex
            }

            .lg\:hidden {
                display: none
            }

            .lg\:h-16 {
                height: 4rem
            }

            .lg\:w-\[250px\] {
                width: 250px
            }

            .lg\:max-w-7xl {
                max-width: 80rem
            }

            .lg\:grid-cols-2 {
                grid-template-columns: repeat(2,minmax(0,1fr))
            }

            .lg\:grid-cols-3 {
                grid-template-columns: repeat(3,minmax(0,1fr))
            }

            .lg\:flex-col {
                flex-direction: column
            }

            .lg\:items-end {
                align-items: flex-end
            }

            .lg\:justify-center {
                justify-content: center
            }

            .lg\:gap-8 {
                gap: 2rem
            }

            .lg\:space-x-8>:not([hidden])~:not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(2rem * var(--tw-space-x-reverse));
                margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)))
            }

            .lg\:p-10 {
                padding: 2.5rem
            }

            .lg\:px-3 {
                padding-left: .75rem;
                padding-right: .75rem
            }

            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }

            .lg\:pb-10 {
                padding-bottom: 2.5rem
            }

            .lg\:pt-0 {
                padding-top: 0
            }

            .lg\:text-\[\#FF2D20\] {
                --tw-text-opacity: 1;
                color: rgb(255 45 32 / var(--tw-text-opacity))
            }
        }

        .ltr\:origin-top-left:where([dir=ltr],[dir=ltr] *) {
            transform-origin: top left
        }

        .ltr\:origin-top-right:where([dir=ltr],[dir=ltr] *) {
            transform-origin: top right
        }

        .rtl\:origin-top-left:where([dir=rtl],[dir=rtl] *) {
            transform-origin: top left
        }

        .rtl\:origin-top-right:where([dir=rtl],[dir=rtl] *) {
            transform-origin: top right
        }

        .rtl\:flex-row-reverse:where([dir=rtl],[dir=rtl] *) {
            flex-direction: row-reverse
        }

        .\[\&\+div\]\:text-xs+div {
            font-size: .75rem;
            line-height: 1rem
        }

        .\[\&\:\:-webkit-scrollbar\]\:hidden::-webkit-scrollbar {
            display: none
        }

        .\[\&\:has\(\[role\=checkbox\]\)\]\:pr-0:has([role=checkbox]) {
            padding-right: 0
        }

        .\[\&\>\[role\=checkbox\]\]\:translate-y-\[2px\]>[role=checkbox] {
            --tw-translate-y: 2px;
            transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .\[\&\>span\]\:line-clamp-1>span {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1
        }

        .\[\&\>tr\]\:last\:border-b-0:last-child>tr {
            border-bottom-width: 0px
        }

        .\[\&_\[cmdk-group-heading\]\]\:px-2 [cmdk-group-heading] {
            padding-left: .5rem;
            padding-right: .5rem
        }

        .\[\&_\[cmdk-group-heading\]\]\:py-1\.5 [cmdk-group-heading] {
            padding-top: .375rem;
            padding-bottom: .375rem
        }

        .\[\&_\[cmdk-group-heading\]\]\:text-xs [cmdk-group-heading] {
            font-size: .75rem;
            line-height: 1rem
        }

        .\[\&_\[cmdk-group-heading\]\]\:font-medium [cmdk-group-heading] {
            font-weight: 500
        }

        .\[\&_\[cmdk-group-heading\]\]\:text-muted-foreground [cmdk-group-heading] {
            color: hsl(var(--muted-foreground))
        }

        .\[\&_\[cmdk-group\]\:not\(\[hidden\]\)_\~\[cmdk-group\]\]\:pt-0 [cmdk-group]:not([hidden])~[cmdk-group] {
            padding-top: 0
        }

        .\[\&_\[cmdk-group\]\]\:px-2 [cmdk-group] {
            padding-left: .5rem;
            padding-right: .5rem
        }

        .\[\&_\[cmdk-input-wrapper\]_svg\]\:h-5 [cmdk-input-wrapper] svg {
            height: 1.25rem
        }

        .\[\&_\[cmdk-input-wrapper\]_svg\]\:w-5 [cmdk-input-wrapper] svg {
            width: 1.25rem
        }

        .\[\&_\[cmdk-input\]\]\:h-12 [cmdk-input] {
            height: 3rem
        }

        .\[\&_\[cmdk-item\]\]\:px-2 [cmdk-item] {
            padding-left: .5rem;
            padding-right: .5rem
        }

        .\[\&_\[cmdk-item\]\]\:py-3 [cmdk-item] {
            padding-top: .75rem;
            padding-bottom: .75rem
        }

        .\[\&_\[cmdk-item\]_svg\]\:h-5 [cmdk-item] svg {
            height: 1.25rem
        }

        .\[\&_\[cmdk-item\]_svg\]\:w-5 [cmdk-item] svg {
            width: 1.25rem
        }

        .\[\&_svg\]\:invisible svg {
            visibility: hidden
        }

        .\[\&_tr\:last-child\]\:border-0 tr:last-child {
            border-width: 0px
        }

        .\[\&_tr\]\:border-b tr {
            border-bottom-width: 1px
        }
    </style>

</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold">Company Name</h1>
            <p class="text-gray-600">1234 Street Name, City, State, 12345</p>
            <p class="text-gray-600">Phone: (123) 456-7890</p>
        </div>

        <div class="mb-4">
            <h2 class="text-2xl font-semibold mb-2">Receipt</h2>
            <p class="text-gray-600">Date: {{ date('F j, Y') }}</p>
            <p class="text-gray-600">Receipt #: 001234</p>
        </div>

        <div class="mb-4">
            <h3 class="text-xl font-semibold mb-2">Billing Information</h3>
            <p class="text-gray-600">Customer Name</p>
            <p class="text-gray-600">customer@example.com</p>
            <p class="text-gray-600">5678 Another St, City, State, 67890</p>
        </div>

        <table class="w-full mb-6">
            <thead>
                <tr>
                    <th class="border-b-2 border-gray-300 py-2 text-left">Description</th>
                    <th class="border-b-2 border-gray-300 py-2 text-right">Quantity</th>
                    <th class="border-b-2 border-gray-300 py-2 text-right">Price</th>
                    <th class="border-b-2 border-gray-300 py-2 text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border-b border-gray-200 py-2">Product 1</td>
                    <td class="border-b border-gray-200 py-2 text-right">1</td>
                    <td class="border-b border-gray-200 py-2 text-right">$10.00</td>
                    <td class="border-b border-gray-200 py-2 text-right">$10.00</td>
                </tr>
                <tr>
                    <td class="border-b border-gray-200 py-2">Product 2</td>
                    <td class="border-b border-gray-200 py-2 text-right">2</td>
                    <td class="border-b border-gray-200 py-2 text-right">$7.50</td>
                    <td class="border-b border-gray-200 py-2 text-right">$15.00</td>
                </tr>
                <tr>
                    <td class="border-b border-gray-200 py-2">Service 1</td>
                    <td class="border-b border-gray-200 py-2 text-right">1</td>
                    <td class="border-b border-gray-200 py-2 text-right">$20.00</td>
                    <td class="border-b border-gray-200 py-2 text-right">$20.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="py-2 text-right font-semibold" colspan="3">Subtotal</td>
                    <td class="py-2 text-right">$45.00</td>
                </tr>
                <tr>
                    <td class="py-2 text-right font-semibold" colspan="3">Tax (5%)</td>
                    <td class="py-2 text-right">$2.25</td>
                </tr>
                <tr>
                    <td class="py-2 text-right font-semibold" colspan="3">Total</td>
                    <td class="py-2 text-right">$47.25</td>
                </tr>
            </tfoot>
        </table>

        <div class="text-center">
            <p class="text-gray-600">Thank you for your business!</p>
        </div>
    </div>
</body>
</html>