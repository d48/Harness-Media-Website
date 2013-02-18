# A sample Guardfile
# More info at https://github.com/guard/guard#readme

guard 'livereload' do
  watch(%r{public/.+\.(css|js|html)})
  watch(%r{application/.+\.(css|js|phtml)})
end

guard 'coffeescript', :input => 'public/js', :output => 'public/js'
