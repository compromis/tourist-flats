<script setup>
const props = defineProps({
  tabs: { type: Array, required: true }
})

const selectedTab = ref(props.tabs[0].id)

function setSelectedTab (tab) {
  selectedTab.value = tab
  const button = document.getElementById(`tab-${tab}`)
  button.focus()
}

function handleTabKeydown (e) {
  let flag = false
  const currentIndex = props.tabs.findIndex((tab) => tab.id === selectedTab.value)

  switch (e.key) {
    case 'ArrowLeft':
      setSelectedTab(currentIndex > 0 ? props.tabs[currentIndex - 1].id : props.tabs[props.tabs.length - 1].id)      
      flag = true
      break

    case 'ArrowRight':
      setSelectedTab(currentIndex == props.tabs.length - 1 ? props.tabs[0].id : props.tabs[currentIndex + 1].id)
      flag = true
      break

    case 'Home':
      setSelectedTab(selectedTab.value = props.tabs[0].id)
      flag = true
      break

    case 'End':
      setSelectedTab(selectedTab.value = props.tabs[props.tabs.length - 1].id)
      flag = true
      break

    default:
      break
  }

  if (flag) {
    e.stopPropagation()
    e.preventDefault()
  }
}
</script>

<template>
  <div class="tab-group">
    <h2 id="TabsTitle" class="visually-hidden">Tabs</h2>
    <div role="tablist" aria-labelledby="TabsTitle" class="tab-buttons">
      <button
        v-for="tab in tabs"
        :key="tab.id"
        :id="`tab-${tab.id}`"
        type="button"
        role="tab"
        class="tab-button"
        :aria-selected="selectedTab === tab.id ? 'true' : 'false'"
        :aria-controls="`tab-panel-${tab.id}`"
        :tabindex="selectedTab === tab.id ? null : '-1'"
        @click="selectedTab = tab.id"
        @keydown="handleTabKeydown"
      >
        {{ tab.label }}
      </button>
    </div>
    <div class="tab-content">
      <div
        v-for="tab in tabs"
        :key="tab.id"
        :id="`tab-panel-${tab.id}`"
        role="tabpanel"
        tabindex="0"
        :aria-labelledby="`tab-${tab.id}`"
        class="tab-panel"
        v-show="selectedTab === tab.id"
      >
        {{ tab.content }}
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.tab {
  &-group {
    --card-padding: var(--spacer-4);
    --border-width: 3px;
    max-width: 850px;
    margin: 0 auto;
  }

  &-buttons {
    position: relative;
    display: flex;
    height: 100px;
    align-items: flex-end;
    z-index: 20;
  }

  &-button {
    position: relative;
    appearance: none;
    background: var(--white);
    border: var(--border-width) var(--pine) solid;
    padding: var(--card-padding) 3rem;
    font-size: var(--text-base);
    color: var(--pine);
    border-radius: 1rem 1rem 0 0;
    border-bottom: 0;
    margin-right: -1.25rem;
    z-index: 5;
    transition: padding .5s ease;

    &:hover,
    &:focus-visible {
      padding-bottom: 3rem;
      text-decoration: underline;
      text-underline-offset: 6px;
      text-decoration-thickness: 3px;
    }

    &[aria-selected='true'] {
      z-index: 10 !important;

      &::after {
        position: absolute;
        content: '';
        bottom: calc(var(--border-width) * -1);
        left: 0;
        right: 0;
        height: var(--border-width);
        background: var(--white);
        z-index: 20;
      }
    }

    &:first-child {
      z-index: 5;
    }

    &:nth-child(2) {
      z-index: 3;
    }

    &:last-child {
      z-index: 1;
    }
  }

  &-content {
    position: relative;
    z-index: 10;
  }

  &-panel {
    background: var(--white);
    color: var(--pine);
    padding: var(--spacer-10);
    border-radius: 0 1rem 1rem 1rem;
    border: var(--border-width) var(--pine) solid;
  }
}
</style>