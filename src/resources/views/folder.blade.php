<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="{{ URL::asset('css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/vendor/font-awesome.css') }}" rel="stylesheet" type="text/css">

    <style>
        body {
            font-family: Menlo, Consolas, monospace;
            color: #444;
        }
        .item {
            cursor: pointer;
        }
        .bold {
            font-weight: bold;
        }
        ul {
            padding-left: 1em;
            line-height: 1.5em;
            list-style-type: dot;
        }
    </style>
    <!-- item template -->
    <script type="text/x-template" id="item-template">
        <li>
            <div :class="{bold: isFolder}" @click="toggle" @dblclick="changeType">
            <span v-if="isFolder"><i class="fa fa-folder-@{{open ? 'open-' : ''}}o"></i> @{{model.name}}</span>
            </div>
            <ul v-show="open" v-if="isFolder">
                <item
                        class="item"
                        v-for="model in model.children"
                        :model="model">
                </item>
                <li @click="addChild">+</li>
            </ul>
        </li>
    </script>
</head>
<body>
<div class="container">
    <div class="content">
        <!-- the demo root element -->
        <ul id="demo">
            <item
                    class="item"
                    :model="treeData">
            </item>
        </ul>
    </div>
</div>

<script src="{{ URL::asset('js/vendor/vue/vue.js') }}"></script>
<script src="{{ URL::asset('js/vendor/vue/vue-resource.js') }}"></script>
<script src="{{ URL::asset('js/folder.js') }}"></script>

</body>
</html>
