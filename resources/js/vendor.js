import dayjs from 'dayjs'
import utc from 'dayjs/plugin/utc'
import timezone from 'dayjs/plugin/timezone'
import relativeTime from 'dayjs/plugin/relativeTime'
import customParseFormat from 'dayjs/plugin/customParseFormat'
import duration from 'dayjs/plugin/duration'
import updateLocale from 'dayjs/plugin/updateLocale'
import LocaleData from 'dayjs/plugin/LocaleData'
import weekOfYear from 'dayjs/plugin/weekOfYear'
import isToday from 'dayjs/plugin/isToday'
import 'dayjs/locale/id'

dayjs.extend(utc)
dayjs.extend(timezone)
dayjs.extend(customParseFormat)
dayjs.extend(relativeTime)
dayjs.extend(duration)
dayjs.extend(updateLocale)
dayjs.extend(LocaleData)
dayjs.extend(weekOfYear)
dayjs.extend(isToday)
dayjs.locale('id')
dayjs.tz.setDefault('Asia/Jakarta')

dayjs.updateLocale('id', {
    strictMode: true,
    weekStart: 1,
})

window.dayjs = dayjs

// common functions
window.formatDate = (date, format = 'DD/MM/YYYY') => dayjs(date).format(format)
window.relativeTime = (date) => dayjs(date).fromNow()
window.isValidDate = (date) => dayjs(date).isValid()

// CountUp.js for animations
import { CountUp } from 'countup.js'
window.CountUp = CountUp
