hash = Hash.new

lines.each do |line|
  puts line.chars.join(' ')
  line.chars do |c|

    if hash.include? c then
      hash[c] += 1
    else
      hash[c] = 1
    end
    puts "Added char #{c} to hash to make #{hash[c]} #{hash}"
  end
end
