# A sample Guardfile
# More info at https://github.com/guard/guard#readme

guard 'coffeescript', :input => 'public/js', :output => 'public/js'

guard 'process', :name => 'gruntConcat', :command => 'grunt dev' do
  # watch(%r{public/js/.+\.(js)})
  watch(%r{public/js/script.js})
end

guard 'sass', :input => 'public/css'

guard 'livereload' do
  watch(%r{public/.+\.(css|html)})
  watch(%r{public/js/Harness-Media-Website.min.js})
  watch(%r{application/.+\.(css|js|phtml|php)})
end


