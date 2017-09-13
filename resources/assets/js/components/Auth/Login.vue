<template>
  <md-layout md-gutter>
    <md-layout md-tag="md-whiteframe" md-flex-xsmall="100" md-flex-small="50" md-flex-offset-small="25" md-flex-medium="50" md-flex-large="50" md-flex-offset-large="25">
        <md-layout md-gutter md-flex="100">
          <h1>Login</h1>
        </md-layout md-gutter>

        <md-layout md-gutter md-flex="100">
          <form style="width:100%">
            <md-input-container>
              <label>With label</label>
              <md-input placeholder="My nice placeholder"></md-input>
            </md-input-container>
          </form>
        </md-layout md-gutter>
      </md-layout>
  </md-layout>
</template>

<script>
    export default {
        mounted() {
        }
    }
</script>
