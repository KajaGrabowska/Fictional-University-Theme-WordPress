!function(){"use strict";var t=window.wp.element,e=window.wp.components;!function(){let t=!1;wp.data.subscribe((function(){const e=wp.data.select("core/block-editor").getBlocks().filter((function(t){return"ourplugin/are-you-paying-attention"==t.name&&null==t.attributes.correctAnswer}));e.length&&0==t&&(t=!0,wp.data.dispatch("core/editor").lockPostSaving("noanswer")),!e.length&&t&&(t=!1,wp.data.dispatch("core/editor").unlockPostSaving("noanswer"))}))}(),wp.blocks.registerBlockType("ourplugin/are-you-paying-attention",{title:"Are You Paying Attention?",icon:"smiley",category:"common",attributes:{question:{type:"string"},answers:{type:"array",default:[""]},correctAnswer:{type:"number",default:void 0}},edit:function(n){return(0,t.createElement)("div",{className:"paying-attention-edit-block"},(0,t.createElement)(e.TextControl,{label:"Question:",value:n.attributes.question,onChange:function(t){n.setAttributes({question:t})},style:{fontSize:"20px"}}),(0,t.createElement)("p",{style:{fontSize:"13px",margin:"20px 0 8px 0"}},"Answers:"),n.attributes.answers.map((function(r,o){return(0,t.createElement)(e.Flex,null,(0,t.createElement)(e.FlexBlock,null,(0,t.createElement)(e.TextControl,{value:r,autoFocus:null==r,onChange:t=>{const e=n.attributes.answers.concat([]);e[o]=t,n.setAttributes({answers:e})}})),(0,t.createElement)(e.FlexItem,null,(0,t.createElement)(e.Button,{onClick:()=>function(t){n.setAttributes({correctAnswer:t})}(o)},(0,t.createElement)(e.Icon,{className:"mark-as-correct",icon:n.attributes.correctAnswer==o?"star-filled":"star-empty"}))),(0,t.createElement)(e.FlexItem,null,(0,t.createElement)(e.Button,{isLink:!0,className:"attention-delete",onClick:()=>function(t){const e=n.attributes.answers.filter((function(e,n){return n!=t}));n.setAttributes({answers:e}),t==n.attributes.correctAnswer&&n.setAttributes({correctAnswer:void 0})}(o)},"Delete")))})),(0,t.createElement)(e.Button,{isPrimary:!0,onClick:()=>{n.setAttributes({answers:n.attributes.answers.concat([void 0])})}},"Add another answer"))},save:function(t){return null}})}();