import dayjs from 'dayjs'

// Core plugins - only import what's needed
import utc from 'dayjs/plugin/utc'
import timezone from 'dayjs/plugin/timezone'
import relativeTime from 'dayjs/plugin/relativeTime'
import customParseFormat from 'dayjs/plugin/customParseFormat'
import duration from 'dayjs/plugin/duration'

// UI/Display plugins
import updateLocale from 'dayjs/plugin/updateLocale'
import LocaleData from 'dayjs/plugin/LocaleData'
import weekOfYear from 'dayjs/plugin/weekOfYear'
import isToday from 'dayjs/plugin/isToday'

// Locale
import 'dayjs/locale/id'

// Configure dayjs with essential plugins first (order matters for some plugins)
dayjs.extend(utc)
dayjs.extend(timezone)
dayjs.extend(customParseFormat)
dayjs.extend(relativeTime)
dayjs.extend(duration)
dayjs.extend(updateLocale)
dayjs.extend(LocaleData)
dayjs.extend(weekOfYear)
dayjs.extend(isToday)

// Set locale and timezone
dayjs.locale('id')
dayjs.tz.setDefault('Asia/Jakarta')

// Global configuration for better performance
const dayjsConfig = {
    // Cache frequently used timezones
    strictMode: true,
    weekStart: 1, // Monday
}

// Apply configuration
dayjs.updateLocale('id', dayjsConfig)

// Export optimized dayjs instance
window.dayjs = dayjs

// Optional: Export helper functions for common operations
window.formatDate = (date, format = 'DD/MM/YYYY') => dayjs(date).format(format)
window.relativeTime = (date) => dayjs(date).fromNow()
window.isValidDate = (date) => dayjs(date).isValid()
