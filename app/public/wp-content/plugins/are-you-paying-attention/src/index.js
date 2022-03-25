<<<<<<< HEAD
import "./index.scss";
import {
  TextControl,
  Flex,
  FlexBlock,
  FlexItem,
  Button,
  Icon,
  PanelBody,
  PanelRow,
  ColorPicker
} from "@wordpress/components";
import {InspectorControls, BlockControls, AlignmentToolbar} from "@wordpress/block-editor";
import {ChromePicker} from "react-color"; 

//immidiately invoked function expression 
(function() { 
  let locked = false;

  wp.data.subscribe(function() {
    const results = wp.data.select("core/block-editor").getBlocks().filter(function(block) {
      return block.name == "ourplugin/are-you-paying-attention" && block.attributes.correctAnswer == undefined
    });

    if (results.length && locked == false) {
      locked = true;
      wp.data.dispatch("core/editor").lockPostSaving("noanswer");
    }

    if (!results.length && locked) {
      locked = false;
      wp.data.dispatch("core/editor").unlockPostSaving("noanswer");
    }
  });
})()

=======
>>>>>>> 4dc65e6754e51d7e3e13bc97ee5c169abb6e29f4
//registerBlockType takes 2 arguments
// - 1st argument is the short name for our block type
// - 2nd argument is a configuration object

wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
  title: "Are You Paying Attention?",
<<<<<<< HEAD
  icon: "lightbulb",
  category: "common",
  attributes: {
    question: { type: "string" },
    answers: { type: "array", default: [""] },
    correctAnswer: { type: "number", default: undefined },
    bgColor: {type: "string", default: "#EBEBEB"},
    theAlignment: {type: "string", default: "left"}
  },
  description: "Give your audience a chance to check their comprehension.",
  example: {
    attributes: {
      question: "What is Earth's largest continent?",
      answers: ['North America', 'Africa', 'Asia', 'Europe'],
      correctAnswer: 2,
      bgColor: "#CFE8F1",
      theAlignment: "center"
    }
  },
  edit: EditComponent,
  save: function (props) {
    return null;
  },
});

function EditComponent(props) {
  function updateQuestion(value) {
    props.setAttributes({ question: value });
  }

  function deleteAnswer(indexToDelete) {
    const newAnswers = props.attributes.answers.filter(function (x, index) {
      return index != indexToDelete;
    });
    props.setAttributes({ answers: newAnswers });
  
    if (indexToDelete == props.attributes.correctAnswer) {
      props.setAttributes({ correctAnswer: undefined });
    }
  }

  function markAsCorrect(index) {
    props.setAttributes({ correctAnswer: index });
  }

  return (
    <div className="paying-attention-edit-block" style={{backgroundColor: props.attributes.bgColor}}>
      <BlockControls>
        <AlignmentToolbar value={props.attributes.theAlignment} onChange={chosenAlignment => props.setAttributes({theAlignment: chosenAlignment})} />
      </BlockControls>
      <InspectorControls>
        <PanelBody title="Background Color" initialOpen={true}>
          <PanelRow>
            <ChromePicker color={props.attributes.bgColor} onChangeComplete={newColor => props.setAttributes({bgColor: newColor.hex})} disableAlpha={true} />
          </PanelRow>
        </PanelBody>
      </InspectorControls>
      <TextControl
        label="Question:"
        value={props.attributes.question}
        onChange={updateQuestion}
        style={{ fontSize: "20px" }}
      ></TextControl>
      <p style={{ fontSize: "13px", margin: "20px 0 8px 0" }}>Answers:</p>
      {props.attributes.answers.map(function (answer, index) {
        return (
          <Flex>
            <FlexBlock>
              <TextControl
                value={answer}
                autoFocus={answer == undefined}
                onChange={(newValue) => {
                  const newAnswers = props.attributes.answers.concat([]);
                  newAnswers[index] = newValue;
                  props.setAttributes({ answers: newAnswers });
                }}
              />
            </FlexBlock>
            <FlexItem>
              <Button onClick={() => markAsCorrect(index)}>
                <Icon
                  className="mark-as-correct"
                  icon={
                    props.attributes.correctAnswer == index
                      ? "star-filled"
                      : "star-empty"
                  }
                />
              </Button>
            </FlexItem>
            <FlexItem>
              <Button
                isLink
                className="attention-delete"
                onClick={() => deleteAnswer(index)}
              >
                Delete
              </Button>
            </FlexItem>
          </Flex>
        );
      })}
      <Button
        isPrimary
        onClick={() => {
          props.setAttributes({
            answers: props.attributes.answers.concat([undefined]),
          });
        }}
      >
        Add another answer
      </Button>
    </div>
  );
}
=======
  icon: "smiley",
  category: "common",
  attributes: {
    skyColor: { type: "string" },
    grassColor: { type: "string" },
  },
  edit: function (props) {
    function updateSkyColor(event) {
      props.setAttributes({ skyColor: event.target.value });
    }

    function updateGrassColor(event) {
      props.setAttributes({ grassColor: event.target.value });
    }

    return (
      <div>
        <input
          type="text"
          placeholder="sky color"
          value={props.attributes.skyColor}
          onChange={updateSkyColor}
        />
        <input
          type="text"
          placeholder="grass color"
          value={props.attributes.grassColor}
          onChange={updateGrassColor}
        />
      </div>
    );
  },
  save: function (props) {
    return (
      <p>
        Today the sky is {props.attributes.skyColor} and the grass is{" "}
        {props.attributes.grassColor}.
      </p>
    );
  },
});
>>>>>>> 4dc65e6754e51d7e3e13bc97ee5c169abb6e29f4
