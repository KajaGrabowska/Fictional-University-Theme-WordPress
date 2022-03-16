//registerBlockType takes 2 arguments
// - 1st argument is the short name for our block type
// - 2nd argument is a configuration object

wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
  title: "Are You Paying Attention?",
  icon: "smiley",
  category: "common",
  edit: function () {
    return (
      <div>
        <p>Hello, this is a paragraph.</p>
        <h4>Hi there.</h4>
      </div>
    )
  },
  save: function () {},
});
