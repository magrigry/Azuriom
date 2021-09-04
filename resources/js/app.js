require('./bootstrap');

console.log('test')

import Editor, {toastui} from '@toast-ui/editor'
import 'codemirror/lib/codemirror.css';
import '@toast-ui/editor/dist/toastui-editor.css';

const editor = new toastui.Editor({
    el: document.querySelector('#markdownEditor'),
    height: '400px',
    initialEditType: 'markdown',
    placeholder: 'Write something cool!',
})
