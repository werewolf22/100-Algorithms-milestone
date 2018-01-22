
# works only if 'n' no. of same element is common in both the array then there should be the same element less than 'n+3' times on any one of the array

array_one =[1,2,3,4,5,6,76,8,9,'hi','hi',"hi","hi"]
array_two =[1,24,45,7,8,9,10,"hi","hi"]
results= []
array_one.each do | o|
o = o.to_s
	array_two.each do |t|
		t=t.to_s
		if (o == t)
			#puts "------------"
			#puts o
			#puts results.length
			if results.length == 0
				results <<  {o => 1}
			else
				garbage=false
                results.each do |result|
					if (result.include? o)
						#puts "------------"
						result[o] += 1
						garbage=true
						#puts results
						break
					end
					#puts "------------"
					# puts results
				end
				unless garbage
					results <<  {o => 1}
				end
			end
		end
	end
end

results.each do |result|
	result.each do |comm,repeat|
		#puts repeat
			sqrt = Math.sqrt(repeat)
			perfect=sqrt.to_i
			if perfect == sqrt
				#puts "#{perfect} #{perfect.to_i}"
				puts "the given arrays contain #{perfect} common #{comm}"
			elsif repeat > perfect*perfect
				puts "the given arrays contain #{perfect} common #{comm}"
			end
	end
end
