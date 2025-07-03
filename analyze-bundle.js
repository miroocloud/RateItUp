#!/usr/bin/env node

// Simple bundle analyzer script
import { execSync } from 'child_process'
import { readFileSync, existsSync } from 'fs'
import { join } from 'path'

console.log('🔍 Analyzing bundle sizes...\n')

try {
    // Build the project
    console.log('Building project...')
    execSync('npm run build', { stdio: 'inherit' })

    // Check if build output exists
    const buildPath = './public/build'
    if (existsSync(buildPath)) {
        console.log('\n📊 Build output files:')
        execSync(`dir "${buildPath}" /s`, { stdio: 'inherit' })
    }

    console.log('\n✅ Bundle analysis complete!')
    console.log('\n💡 Tips for optimization:')
    console.log('- Use dynamic imports for code splitting')
    console.log('- Remove unused dependencies')
    console.log('- Enable gzip compression on your server')
    console.log('- Consider using CDN for vendor libraries')

} catch (error) {
    console.error('❌ Error analyzing bundle:', error.message)
}
