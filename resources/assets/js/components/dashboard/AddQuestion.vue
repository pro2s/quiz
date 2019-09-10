<template>
    <div>
    <slot name="input">
        <vue-autosuggest
            ref="autocomplete"
            :suggestions="suggestions"
            :inputProps="inputProps"
            :sectionConfigs="sectionConfigs"
            :getSuggestionValue="getSuggestionValue"
              >  
            <template slot-scope="{suggestion}">
                <span class="my-suggestion-item">{{suggestion.item.title}}</span>
            </template>
        </vue-autosuggest>
    </slot>
    
    <div v-if="selected">
         <slot :selected="selected" name="selected"> 
            You have selected:
            <code><pre>{{JSON.stringify(selected, null, 4)}}</pre></code>
         </slot>
    </div>  
  </div>
</template>

<script>
import { VueAutosuggest } from "vue-autosuggest";
import axios from "axios";

export default {
  components: {
    VueAutosuggest
  },
  props: ["searchUrl"],
  data() {
    return {
      results: [],
      timeout: null,
      selected: null,
      debounceMilliseconds: 50,
      inputProps: {
        id: "autosuggest__input",
        onInputChange: this.fetchResults,
        placeholder: "Do you feel lucky, punk?",
        class: "form-control",
        name: "hello"
      },
      suggestions: [],
      sectionConfigs: {
        default: {
          limit: 6,
          onSelected: selected => {
            this.selected = selected.item;
          }
        }
      }
    };
  },
  methods: {
    fetchResults(val) {
      clearTimeout(this.timeout);
      this.timeout = setTimeout(() => {
        axios.get(this.searchUrl).then(values => {
          this.suggestions = [];
          this.selected = null;

          const photos = this.filterResults(values.data, val, "title");

          photos.length &&
            this.suggestions.push({ name: "default", data: photos });
        });
      }, this.debounceMilliseconds);
    },
    filterResults(data, text, field) {
      return data
        .filter(item => {
          if (item[field].toLowerCase().indexOf(text.toLowerCase()) > -1) {
            return item[field];
          }
        })
        .sort();
    },
    renderSuggestion(suggestion) {
      const image = suggestion.item;
      console.log(image);
      return image.title;
    },
    getSuggestionValue(suggestion) {
      let { name, item } = suggestion;
      return item.title;
    }
  }
};
</script>

<style>
#autosuggest__input.autosuggest__input-open {
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.autosuggest__results-container {
  position: relative;
  width: 100%;
}

.autosuggest__results {
  font-weight: 300;
  margin: 0;
  position: absolute;
  z-index: 10000001;
  width: 100%;
  border: 1px solid #e0e0e0;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
  background: white;
  padding: 0px;
  max-height: 400px;
  overflow-y: scroll;
}

.autosuggest__results ul {
  list-style: none;
  padding-left: 0;
  margin: 0;
}

.autosuggest__results .autosuggest__results_item {
  cursor: pointer;
  padding: 15px;
}

#autosuggest ul:nth-child(1) > .autosuggest__results_title {
  border-top: none;
}

.autosuggest__results .autosuggest__results_title {
  color: gray;
  font-size: 11px;
  margin-left: 0;
  padding: 15px 13px 5px;
  border-top: 1px solid lightgray;
}

.autosuggest__results .autosuggest__results_item:active,
.autosuggest__results .autosuggest__results_item:hover,
.autosuggest__results .autosuggest__results_item:focus,
.autosuggest__results
  .autosuggest__results_item.autosuggest__results_item-highlighted {
  background-color: #f6f6f6;
}
</style>