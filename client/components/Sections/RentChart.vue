<script setup>
const city = useState('city')

const data = [
  { month: 'Jun 2023', number: 800, currency: '800€' },
  { month: 'Jul 2023', number: 850, currency: '850€' },
  { month: 'Ago 2023', number: 900, currency: '900€' },
  { month: 'Set 2023', number: 910, currency: '910€' },
  { month: 'Oct 2023', number: 920, currency: '920€' },
  { month: 'Nov 2023', number: 980, currency: '980€' },
  { month: 'Des 2023', number: 1000, currency: '1.000€' },
  { month: 'Gen 2024', number: 1040, currency: '1.040€' },
  { month: 'Feb 2024', number: 1080, currency: '1.080€' },
  { month: 'Mar 2024', number: 1200, currency: '1.100€' },
  { month: 'Abr 2024', number: 1350, currency: '1.200€' },
  { month: 'Maig 2024', number: 1400, currency: '1.400€' },
  { month: 'Juny 2024', number: 1500, currency: '1.500€' },
  { month: 'Juliol 2024', number: 1600, currency: '1.600€' },
]

const currentIndex = ref(0)
const currentPoint = computed(() => data[currentIndex.value])
const chartWidth = computed(() => {
  const minPrice = 400
  const maxPrice = data[data.length - 1].number
  return (currentPoint.value.number - minPrice) * 100 / (maxPrice - minPrice)
})

let interval = 1000
function startAnimation () {
  setTimeout(() => {
    const totalPoints = data.length

    if (currentIndex.value < totalPoints - 1) {
      currentIndex.value++
      interval -= 80
      startAnimation()
    } else {
      blinking.value = true
    }
  }, interval)
}

const blinking = ref(false)

onMounted(() => {
  startAnimation()
})
</script>

<template>
  <section :class="['rent-chart', { blinking }]" aria-labelledby="RentChartTitle">
    <div class="container padded">
      <div class="card">
        <div class="card-header">
          <h2 id="RentChartTitle">
            {{ $t('rent_chart.header', { city: city.name }) }}
          </h2>
        </div>
        <div class="card-content">
          <div class="months">
            <template v-for="point in data" :key="point.month">
              <Transition name="slide">
                <div v-if="point.month === currentPoint.month" class="month">
                  {{ point.month }}
                </div>
              </Transition>
            </template>
          </div>
          <div class="chart">
            <div class="chart-bar" :style="{ width: `${chartWidth}%` }">
              <div class="chart-bar-inner" />
              <div class="chart-bar-tooltips">
                <div class="tooltip-wrapper">
                  <span>⚠️</span>
                  <template v-for="point in data" :key="point.month">
                    <Transition name="slide">
                      <div v-if="point.currency === currentPoint.currency" class="tooltip">
                        {{ point.currency }}
                      </div>
                    </Transition>
                  </template>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
.rent-chart {
  overflow: clip;

  .card {
    max-width: 700px;
    margin: 0 auto;
    border: 2px var(--white) solid;
    border-radius: .75rem;
    --card-padding: var(--spacer-4);

    &-header {
      padding: var(--card-padding);
      border-bottom: 2px var(--white) solid;
      letter-spacing: -.02em;
      text-align: center;
      text-wrap: balance;
      font-size: var(--text-md);

      h2 {
        font-size: inherit;
      }
    }

    &-content {
      display: grid;
      grid-template-columns: 150px 1fr;
      padding: var(--card-padding);
      min-height: 170px;
      align-items: center;
      gap: var(--card-padding);
    }
  }

  .months {
    position: relative;
    font-weight: 900;
    font-size: var(--text-md);
    height: 1em;

    .month {
      position: absolute;
      inset: 0;
      text-align: right;
    }
  }

  .chart {
    position: relative;
    height: 2em;
    width: calc(100% + 250px);
    font-size: var(--text-md);

    &-bar {
      display: flex;
      position: absolute;
      height: 100%;
      transition: .5s ease;
      gap: var(--card-padding);
      align-items: center;

      &-inner {
        background: linear-gradient(to right, var(--yellow) 0, var(--orange) 35%);
        width: 100%;
        height: 100%;
        border-radius: .75rem;
        border: 3px var(--pine) solid;
        background-size: 700px;
      }

      &-tooltips {
        position: relative;
        width: 5.5em;
        flex-shrink: 0;
        background: var(--pine);
        font-weight: 900;
        padding: .4em;
        border-radius: .5em;

        .tooltip {
          position: absolute;
          inset: 0;
          display: flex;
          align-items: center;
          padding-left: 1.25em;
          justify-content: center;
        }
      }
    }
  }

  &.blinking .tooltip-wrapper {
    animation: blink 1s linear infinite;
  }
}

@include media('<md') {
  .rent-chart {
    .card {
      --card-padding: var(--spacer-3);

      &-header {
        font-size: var(--text-base);
      }

      &-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        min-height: auto;

        .months {
          width: 100%;

          .month {
            text-align: center;
            font-size: var(--text-base);
          }
        }
      }
    }
    
    .chart {
      width: calc(100% + 37px);
      height: 4em;

      &-bar {
        flex-direction: column;
        gap: var(--spacer-1);

        &-inner {
          order: 1;
          height: 2.25em;
          flex-shrink: 0;
        }

        &-tooltips {
          order: 0;
          align-self: flex-end;
          font-size: var(--text-base);
        }
      }
    }
  }
}
</style>